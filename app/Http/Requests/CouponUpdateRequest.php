<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponUpdateRequest extends FormRequest
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
            'code' =>'required|max:50|unique:coupons,code,' .$this->id,
            'use_by_user_amount' =>'required',
            'time_end' =>'required',
            'total_amount' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => __('Mã khuyến mãi không được để trống'),
            'code.unique' => __('Mã sản phẩm phải là duy nhất'),
            'code.max' => __('Mã sản phẩm không vượt quá 50 kí tự'),
            'use_by_user_amount.required' => __('Số lượng mỗi khách hàng được sử dụng không được để trống'),
            'time_end.required' => __('Thời gian không được để trống'),
            'total_amount.required' => __('Số lượng không được để trống'),
        ];
    }
}
