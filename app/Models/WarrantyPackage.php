<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyPackage extends Model
{
    use HasFactory;

    protected $table = 'warranty_package';

    protected $fillable = [
        'title', 'device', 'description', 'type', 'time_on', 'price'
    ];
}
