<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_variation_id',
        'product_name', 'variation_label',
        'quantity', 'unit_price', 'total_price',
    ];

    protected $casts = [
        'unit_price'  => 'decimal:0',
        'total_price' => 'decimal:0',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariation(): BelongsTo
    {
        return $this->belongsTo(ProductVariation::class);
    }
}
