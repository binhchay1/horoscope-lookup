<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Tên sản phẩm không được để trống'),
            'name.max' => __('Tên sản phẩm không vượt quá 191 kí tự'),
        ];
    }
}
