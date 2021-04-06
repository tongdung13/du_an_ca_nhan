<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'address' => 'required',
            'image' => 'required',
            'role' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Định dạng email không đúng',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password không được ít hơn 6 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'image.required' => 'Hình ảnh không được để trống',
            'role.required' => 'Chức vụ không được để trống',
            'phone.required' => 'Số điện thoại không được để trống' 
        ];
    }
}
