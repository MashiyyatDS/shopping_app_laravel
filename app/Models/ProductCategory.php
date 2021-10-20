<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'slug'
    ];

    protected $hidden = [
        'product_id',
        'category_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($product) {
            $product->slug = 'product-category-'.rand().$product->id.time();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
