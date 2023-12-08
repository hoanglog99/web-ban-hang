<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|max:190|min:3|unique:users,email,'.$this->id,
            'name'      => 'required|min:2',
            'phone'     => 'required|min:10|unique:users,phone,'.$this->id,
            'password'  => 'required|min:8',
//            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Dữ liệu không được để trống',
            'name.min'               => 'Tên không hợp lệ',
            'email.required'         => 'Dữ liệu không được để trống',
            'email.unique'           => 'Dữ liệu đã tồn tại',
            'phone.unique'           => 'Dữ liệu đã tồn tại',
            'phone.required'         => 'Dữ liệu không được để trống',
            'phone.min'              => 'Số điện thoại không hợp lệ',
            'password.required'      => 'Dữ liệu không được để trống',
            'password.min'           => 'Mật khẩu phải dài hơn 8 kí tự',
        ];
    }
}
