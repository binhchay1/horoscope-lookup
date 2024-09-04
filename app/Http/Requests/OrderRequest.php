<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_date' =>'required',
            'phone' =>'required',
            'address' =>'required|max:100',
            'name' =>'required|max:100',
            'province' =>'required|max:100',
            'district' =>'required|max:100',
            'ward' =>'required|max:100',
            'email' =>'required|email',
        ];
    }

    public function messages()
    {
        return [
            'order_date.required' => __('Ngày đặt hàng không được để trống'),
            'phone.required' => __('Số điện thoại không được để trống'),
            'address.required' => __('Địa chỉ không được để trống'),
            'address.max' => __('Địa chỉ không được vượt quá 100 kí tự'),
            'name.required' => __('Tên không được để trống'),
            'name.max' => __('Tên được vượt quá 100 kí tự'),
            'province.required' => __('Tỉnh/Thành phố không được để trống'),
            'province.max' => __('Tỉnh/Thành phố không được vượt quá 100 kí tự'),
            'district.required' => __('Quận/Huyện không được để trống'),
            'district.max' => __('Quận/Huyện không được vượt quá 100 kí tự'),
            'ward.required' => __('Phường/Xã không được để trống'),
            'ward.max' => __('Phường/Xã không được vượt quá 100 kí tự'),
            'email.required' => __('Email không được để trống'),
            'email.email' => __('Email không đúng định dạng'),
        ];
    }
}
