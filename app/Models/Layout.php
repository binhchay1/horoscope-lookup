<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Layout extends Model
{
    use HasFactory;
    protected $table = 'layout';
    protected $fillable = [
        'slide_thumbnail',
        'small_thumbnail_1',
        'small_thumbnail_2',
        'small_thumbnail_3',
        'small_thumbnail_4',
        'small_thumbnail_5',
        'small_thumbnail_6',
        'flash_sale_list_product_id',
        'flash_sale_timer',
        'hot_sale_big_thumbnail',
        'hot_sale_list_product_id',
        'small_banner_thumbnail_left',
        'small_banner_thumbnail_right',
        'permarklink_small_thumbnail_1',
        'permarklink_small_thumbnail_2',
        'permarklink_small_thumbnail_3',
        'permarklink_small_thumbnail_4',
        'permarklink_small_thumbnail_5',
        'permarklink_small_thumbnail_6',
        'permarklink_small_thumbnail_1',
        'permarklink_hot_sale_big_thumbnail',
        'permarklink_small_banner_thumbnail_left',
        'permarklink_small_banner_thumbnail_right',
        'footer_slide_thumbnail',
        'banner_promotion_thumbnail',
        'hide_banner_promotion_thumbnail',
        'adv_thumbnail',
        'permarklink_adv_thumbnail',
        'hide_adv_thumbnail',
        'build_pc_thumbnail',
        'permarklink_build_pc_thumbnail',
        'hide_build_pc_thumbnail',
    ];
}
