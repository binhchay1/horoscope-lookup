<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildPC extends Model
{
    use HasFactory;
    protected $table = 'buildpcs';

    protected $fillable = [
        'name', 'offers','category_id'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }
}
