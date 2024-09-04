<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {
        return [
            'big_thumbnail' =>'required|mimes:jpeg,png,jpg|max:2048',
            'small_thumbnail_1' =>'required|mimes:jpeg,png,jpg|max:2048',
            'small_thumbnail_2' =>'required|mimes:jpeg,png,jpg|max:2048',
            'small_thumbnail_3' =>'required|mimes:jpeg,png,jpg|max:2048',
            'small_thumbnail_4' =>'required|mimes:jpeg,png,jpg|max:2048',
            'small_thumbnail_5' =>'required|mimes:jpeg,png,jpg|max:2048',
            'small_thumbnail_6' =>'required|mimes:jpeg,png,jpg|max:2048',
            'flash_sale_timer' =>'date',
            'small_banner_thumbnail_1' =>'required|mimes:jpeg,png,jpg|max:2048',
            'small_banner_thumbnail_2' =>'required|mimes:jpeg,png,jpg|max:2048',
        
        ];
    }
    
    public function messages()
    {
        return [
            'thumbnail.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'thumbnail.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_thumbnail_1.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_thumbnail_1.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_thumbnail_2.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_thumbnail_2.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_thumbnail_3.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_thumbnail_3.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_thumbnail_4.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_thumbnail_4.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_thumbnail_5.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_thumbnail_5.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_thumbnail_6.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_thumbnail_6.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_banner_thumbnail_1.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_banner_thumbnail_1.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'small_banner_thumbnail_2.mine' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
            'small_banner_thumbnail_2.max' => __('Hình ảnh sản phẩm không vượt quá 2048'),
            'flash_sale_timer.date' => __('Hình ảnh sản phẩm không đúng định dạng: jpeg,png,jpg '),
        ];
    }
}
