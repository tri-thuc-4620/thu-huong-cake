<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'category_id',
        'price',
        'sale_price',
        'stock_quantity',
        'stock_status',
        'short_description',
        'description',
        'is_visible',
        'is_featured',
        'is_hot',
        'is_new',
        'sort_order',
        'views',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'stock_status' => 'string',
        'is_visible' => 'boolean',
        'is_featured' => 'boolean',
        'is_hot' => 'boolean',
        'is_new' => 'boolean',
        'sort_order' => 'integer',
        'views' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function cakeSizes(): BelongsToMany
    {
        return $this->belongsToMany(CakeSize::class, 'product_cake_size')->withPivot('price');
    }

    public function cakeBases(): BelongsToMany
    {
        return $this->belongsToMany(CakeBase::class, 'product_cake_base')->withPivot('surcharge');
    }
}
