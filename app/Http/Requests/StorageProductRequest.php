<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:0|max:100',
            'storage_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Sản phẩm không được để trống',
            'quantity.required' => 'Số lượng không được để trống',
            'quantity.min' => 'Số lượng không dưới 0 sản phẩm',
            'quantity.max' => 'Số lượng không quá 100 sản phẩm',
            'storage_id.required' => 'Kho không được để trống',
        ];
    }
}
