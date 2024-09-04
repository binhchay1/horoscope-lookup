<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryStorage extends Model
{
    use HasFactory;

    protected $table = 'story_storage';

    protected $fillable = [
        'product_id', 'user_id', 'storage_id', 'quantity', 'code', 'note'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
