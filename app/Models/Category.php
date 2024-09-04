<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'parent', 'image', 'status', 'key_word', 'title', 'description'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
            $originalSlug = $slug = $category->slug;
            $count = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $category->slug = $slug;
        });
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent', 'id')->with('children');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'parent', 'category_id', 'id');
    }

    public function categoryFilter()
    {
        return $this->hasMany(CategoryFilter::class, 'category_id', 'id');
    }

    public function productChildren()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(Category::class, 'parent', 'id');
    }
}
