<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'code',
        'status',
        'price',
        'slug',
        'short_description',
        'new_price',
        'sale_detail',
        'detail',
        'hot_status',
        'hot_sale_status',
        'key_word',
        'title',
        'brand_id',
        'status_guarantee',
        'detail_tech',
        'views',
        'link_youtube',
        'warranty_package'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id', 'id');
    }

    public function brands()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function warrantyPackages()
    {
        return $this->hasOne(WarrantyPackage::class, 'id', 'warranty_package_id');
    }

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

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);

            $originalSlug = $slug = $product->slug;
            $count = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $product->slug = $slug;
        });
    }

    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->video)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute([
            'width' => 104,
            'height' => 104
        ]);
        return $embed->getHtml();
    }
}
