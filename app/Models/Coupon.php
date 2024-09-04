<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [
        'code',
        'discount_amount',
        'list_product_id',
        'type',
        'use_amount',
        'total_amount',
        'use_by_user_amount',
        'time_end',
        'private_status',
    ];

    public function product()
    {
        return $this->belongsTo(CategoryPost::class,'list_product_id' ,'id' );
    }
}
