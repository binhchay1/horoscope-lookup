<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'category_id'=> 'required',
            'name' =>'required|max:191',
            'description' =>'required',
            'status' =>'required',
            'code' =>'required|max:50|unique:products,code,' .$this->id,
            'price' =>'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => __('Danh mục không được để trống'),
            'name.required' => __('Tên sản phẩm không được để trống'),
            'name.max' => __('Tên sản phẩm không vượt quá 191 kí tự'),
            'description.required' => __('Miêu tả sản phẩm không được để trống'),
            'status.required' => __('Trạng thái sản phẩm không được để trống'),
            'code.required' => __('Mã sản phẩm không được để trống'),
            'price.required' => __('Giá sản phẩm không được để trống'),
            'code.max' => __('Mã sản phẩm không vượt quá 50 kí tự'),
            'code.unique' => __('Mã sản phẩm phải là duy nhất'),
        ];
    }
}
