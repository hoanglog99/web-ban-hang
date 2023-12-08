<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users', 
            ],[
                'email.exists' => 'Email không tồn tại trên hệ thống!',
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Email không đúng định dạng!',
            ]);            
            if ($validator->passes()) {
                // Generate new password
                $new_password = Str::random(8);

                // Update password
                User::where('email', $data['email'])->update(['password' => bcrypt($new_password)]);

                // Get user details
                $userDetails = User::where('email', $data['email'])->first()->toArray();

                // Send Email To User
                $email = $data['email'];
                $messageData = ['name' => $userDetails['name'], 'email' => $email, 'password' => $new_password];

                // Jobs queue email
                Mail::send('emails.reset_password',$messageData,function($message)use($email){
                            $message->to($email)->subject('Đặt Lại Mật khẩu Mới');
                });             

                // Trả về phản hồi JSON thành công
                return response()->json(['type' => 'success', 'message' => 'Mật Khẩu Mới Đã Được Chúng Tôi Gửi Tới Email Của Bạn!'])
                    ->cookie('notification', true, 1);

            } else {
                // Trả về phản hồi JSON lỗi
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);
            }
        } else {
            return view('auth.passwords.forget');
        }
    }
}
