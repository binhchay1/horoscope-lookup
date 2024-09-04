<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'code' =>'required|max:255|unique:products,code',
            'price' =>'required|max:255',
            'image' =>'required',
            'image.*' => 'mimes:jpg,jpeg,png|max:2048'
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
            'code.unique' => __('Mã sản phẩm phải là duy nhất'),
            'price.required' => __('Giá sản phẩm không được để trống'),
            'code.max' => __('Mã sản phẩm không vượt quá 255 kí tự'),
            'image.required' => __('Hình ảnh sản phẩm không được để trống'),
            'image.*.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'image.*.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
        ];
    }

}
