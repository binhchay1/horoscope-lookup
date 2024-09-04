<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildPCRequest extends FormRequest
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
            'name' =>'required|max:191',
            'offers' =>'max:191',
            'category_id' =>'required'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => __('Tên cấu hình không được để trống'),
            'name.max' => __('Tên cấu hình không vượt quá 191 kí tự'),
            'offers.max' => __('Khuyến mãi không vượt quá 191 kí tự'),
            'category_id.required' => __('Thể loại sản phẩm không được để trống'),
        ];
    }
}
