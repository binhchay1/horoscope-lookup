<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'content' =>'required|max:500',
            'rating_product' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => __('Nội dung không được để trống'),
            'content.max' => __('Nội dung không vượt quá 191 kí tự'),
            'rating_product.required' => __('Đánh giá không được để trống'),
        ];
    }
}
