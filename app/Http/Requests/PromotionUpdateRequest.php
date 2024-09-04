<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionUpdateRequest extends FormRequest
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
            'short_description' =>'required',
            'content' =>'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Tiêu đề quảng cáo không được để trống'),
            'title.max' => __('Tiêu đề quảng cáo không được vượt quá 191 kí tự'),
            'short_description.required' => __('Tiêu đề quảng cáo không được để trống'),
            'content.required' => __('Nội dung quảng cáo không được để trống'),
            'image.image' => __('Hình ảnh không đúng định dạng'),
            'image.mimes' => __('Hình ảnh không đúng định dạng'),
            'image.max' => __('Kích thước ảnh không quá 2048px'),
            'start_date.required' => __('Ngày bắt đầu không được để trống'),
            'start_date.date' => __('Ngày bắt đầu không đúng định dạng'),
            'end_date.required' => __('Ngày kết thúc không được để trống'),
            'end_date.date' => __('Ngày kết thúc không đúng định dạng'),
            'end_date.after_or_equal' => __('Ngày kết thúc phải sau ngày bắt đầu'),
        ];
    }
}
