<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' =>'required|max:191',
            'content' =>'required',
            'category_id' =>'required',
            'short_description' =>'required',
            'thumbnail' =>'required|mimes:jpeg,png,jpg|max:2048'

        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Tiêu đề bài viết không được để trống'),
            'title.max' => __('Tiêu đề bài viết không được vượt quá 191 kí tự'),
            'category_id.required' => __('Danh mục bài viết không được để trống'),
            'short_description.required' => __('Miêu tả bài viết không được để trống'),
            'thumbnail.required' => __('Hình ảnh sản phẩm không được để trống'),
            'thumbnail.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'thumbnail.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
        ];
    }
}
