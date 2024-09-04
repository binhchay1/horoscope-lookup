<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionProductViewed extends Model
{
    use HasFactory;

    protected $table = 'session_product_viewed';

    protected $fillable = [
        'session_id', 'list_products'
    ];
}
