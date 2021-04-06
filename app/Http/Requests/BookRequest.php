<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|min:6',
            'category' => 'required',
            'image' => 'required|min:6',
            'status' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên không được ít hơn 6 ký tự',
            'category.required' => 'Thể loại không được để trống',
            'image.required' => 'Hình ảnh không được để trống',
            'status.required' => 'Trạng trái không được để trống',
            'description.required' => 'Mô tả không được để trống',
        ];
    }
}
