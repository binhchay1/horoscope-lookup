<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReviewRequest extends FormRequest
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
            'customer_name' => 'required|max:100',
            'customer_review' => 'required|max:300',
            'thumbnail' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => __('Tên khách hàng không được để trống'),
            'customer_name.max' => __('Tên khách hàng không vượt quá 100 kí tự'),
            'customer_review.max' => __('Nội dung đánh giá không vượt quá 300 kí tự'),
            'customer_review.required' => __('Nội dung đánh giá không được để trống'),
            'thumbnail.required' => __('Ảnh không được để trống'),
        ];
    }
}
