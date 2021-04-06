<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'name.required|min:6',
            'customer_code' => 'required|min:6',
            'school' => 'required',
            'class' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'cmnd' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên không được ít hơn 6 ký tự',
            'customer_code.required' => 'Mã khách hàng không được để trống',
            'customer_code.min' => 'Mã khách hàng không được ít hơn 6 ký tự',
            'school.required' => 'Tên trường không được để trống',
            'class.required' => 'Tên lớp không được để trống',
            'dob.required' => 'Ngày sinh không được để trống',
            'email.required' => 'Email không được để trống',
            'cmnd.required' => 'CMND không được để  trống'
        ];
    }
}
