<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariation extends Model
{
    protected $fillable = [
        'product_id', 'sku', 'price', 'sale_price',
        'stock_quantity', 'stock_status', 'weight',
        'image', 'description', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'price'      => 'decimal:0',
        'sale_price' => 'decimal:0',
        'is_active'  => 'boolean',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variation_values')
                     ->withTimestamps();
    }

    /* ── Accessors ─────────────────────────────────── */

    protected function label(): CastAttribute
    {
        return CastAttribute::make(
            get: fn () => $this->attributeValues
                               ->pluck('name')
                               ->join(' - '),
        );
    }
}
