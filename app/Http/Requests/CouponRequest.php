<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'code' =>'required|max:50|unique:coupons,code',
            'discount_amount' =>'required',
            'list_product_id' =>'required',
            'type' =>'required',
            'use_amount' =>'required',
            'total_amount' =>'required',
            'apply_user_status' =>'required',
            'time_end' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => __('Mã khuyến mãi không được để trống'),
            'code.unique' => __('Mã sản phẩm phải là duy nhất'),
            'code.max' => __('Mã sản phẩm không vượt quá 50 kí tự'),
            'discount_amount.required' => __('Khuyến mãi không được để trống'),
            'list_product_id.required' => __('Sản phẩm khuyến mãi không được để trống'),
            'type.required' => __('Loại khuyến mãi không được để trống'),
            'use_amount.required' => __('Số lượng sử dụng khuyến mãi không được để trống'),
            'total_amount.required' => __('Tổng số khuyến mãi không được để trống'),
            'apply_user_status.required' => __('Trạng thái khuyến mãi không được để trống'),
            'time_end.required' => __('Thời hạn khuyến mãi không được để trống'),
        ];
    }
}
