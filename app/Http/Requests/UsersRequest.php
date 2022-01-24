<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        'name'      => 'required',
        'email'     => 'required',
        'address'   => 'required',
        'birthday'  => 'required',
        'gender'    => 'required',
        'password'  => 'required',
        ];
    }
    public function messages()
    {
        return [
        'name.required'     => "Vui lòng nhập tên người dùng",
        'email.required'    => "Vui lòng nhập email người dùng",
        'address.required'  => "Vui lòng nhập địa chỉ người dùng",
        'birthday.required' => "Vui lòng nhập ngày sinh người dùng",
        'gender.required'   => "Vui lòng nhập giới tính người dùng",
        'password.required' => "Vui lòng nhập mật khẩu  người dùng",
        ];
    }
}
