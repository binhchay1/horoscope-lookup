<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
//        $age = date("Y-m-d", time() + 86400);
        return [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'profile_photo_path' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => __('Tên người dùng không được để trống'),
            'name.max' => __('Tên người dùng không vượt quá 191 kí tự'),
            'email.required' => __('Địa chỉ email không được để trống'),
            'email.email' => __('Địa chỉ email không đúng định dạng'),
            'email.unique' => __('Địa chỉ email phải là duy nhất'),
            'age.required|' => __('Ngày sinh không được để trống'),
            'address.required' => __('Địa chỉ không được để trống'),
            'phone.required' => __('Số điện thoại không được để trống'),
            'profile_photo_path.image' => __('Ảnh đại diện không được để trống'),
            'profile_photo_path.mimes' => __('Ảnh đại diện không đúng định dạng'),
            'profile_photo_path.max' => __('Ảnh đại diện không được vượt quá 2048'),
            'password.required' => __('Mật khẩu không được để trống'),
        ];
    }
}
