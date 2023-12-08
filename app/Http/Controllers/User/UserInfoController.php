<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequestUpdateInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserInfoController extends Controller
{
    public function updateInfo()
    {
        return view('user.update_info');
    }

    public function saveUpdateInfo(UserRequestUpdateInfo $request)
    {
        $data = $request->except('_token','avatar');
        $user = User::find(\Auth::id());

        if ($request->avatar) {
            $image = upload_image('avatar');
            if ($image['code'] == 1)
                $data['avatar'] = $image['name'];
        }

        $user->update($data);

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Cập nhật thành công'
        ]);

        return redirect()->back();
    }

    public function changePassword()
    {
        return view('user.change_pass');
    }
    public function saveChangePassword(Request $request)
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();
    
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải chứa ít nhất :min ký tự.',
        ]);
    
        // Kiểm tra xem mật khẩu hiện tại có khớp không
        if (Hash::check($request->current_password, $user->password)) {
            // Kiểm tra xem mật khẩu cũ và mật khẩu mới có giống nhau không
            if ($request->current_password !== $request->new_password) {
                // Cập nhật mật khẩu mới cho người dùng
                $user->password = Hash::make($request->new_password);
                $user->save();

                return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi thành công!');
            } else {
                return redirect()->back()->withErrors(['new_password' => 'Mật khẩu mới không được trùng với mật khẩu cũ!'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng!'])->withInput();
        }
    }


}
