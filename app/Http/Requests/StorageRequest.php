<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
//        $age = date("Y-m-d", time() + 86400);
        return [
            'name' => 'required|max:255',
            'address' => 'required|max:255',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Tên kho không được để trống'),
            'name.max' => __('Tên kho không vượt quá 255 kí tự'),
            'address.required' => __('Địa chỉ kho không được để trống'),
            'address.max' => __('Địa chỉ kho không vượt quá 255 kí tự'),
        ];
    }
}
