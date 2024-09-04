<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReviewUpdateRequest extends FormRequest
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
            'customer_name' => 'required|max_length:100',
            'customer_review' => 'required|max_length:300',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => __('Tên khách hàng không được để trống'),
            'customer_name.max_length' => __('Tên khách hàng không vượt quá 100 kí tự'),
            'customer_review.max_length' => __('Nội dung đánh giá không vượt quá 300 kí tự'),
            'customer_review.required' => __('Nội dung đánh giá không được để trống'),
        ];
    }
}
