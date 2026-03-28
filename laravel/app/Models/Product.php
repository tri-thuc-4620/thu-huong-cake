<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'sku', 'category_id', 'variation_set_id', 'type',
        'price', 'sale_price', 'sale_start', 'sale_end',
        'stock_quantity', 'stock_status', 'manage_stock', 'low_stock_threshold',
        'weight', 'prep_time', 'advance_order',
        'short_description', 'description',
        'is_visible', 'is_featured', 'is_hot', 'is_new',
        'sort_order', 'views',
        'focus_keyword', 'meta_title', 'meta_description',
    ];

    protected $casts = [
        'price'        => 'decimal:0',
        'sale_price'   => 'decimal:0',
        'manage_stock' => 'boolean',
        'is_visible'   => 'boolean',
        'is_featured'  => 'boolean',
        'is_hot'       => 'boolean',
        'is_new'       => 'boolean',
        'sale_start'   => 'date',
        'sale_end'     => 'date',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function variationSet(): BelongsTo
    {
        return $this->belongsTo(VariationSet::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(ProductTag::class, 'product_tag', 'product_id', 'tag_id');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }
}
