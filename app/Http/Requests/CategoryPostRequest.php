<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' =>'required|max:191',
            'image' =>'mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Tên danh mục không được để trống'),
            'name.max' => __('Tên danh mục không được vượt quá 191 kí tự'),
            'image.mine' => __('Hình ảnh không đúng định dạng: jpeg,png,jpg '),
            'image.max' => __('Hình ảnh không vượt quá 2048'),
        ];
    }
}
