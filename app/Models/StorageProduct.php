<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageProduct extends Model
{
    use HasFactory;
    protected $table ='storage_product';

    protected $fillable = [
        'product_id',
        'storage_id',
        'quantity',
    ];
}
