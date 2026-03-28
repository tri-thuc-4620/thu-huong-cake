<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number', 'user_id',
        'customer_name', 'customer_phone', 'customer_email',
        'delivery_type', 'delivery_address', 'pickup_store_id',
        'delivery_date', 'delivery_time',
        'note', 'gift_recipient_name', 'gift_recipient_phone',
        'subtotal', 'shipping_fee', 'discount', 'total',
        'payment_method', 'status',
        'cancel_reason', 'admin_note',
    ];

    protected $casts = [
        'subtotal'      => 'decimal:0',
        'shipping_fee'  => 'decimal:0',
        'discount'      => 'decimal:0',
        'total'         => 'decimal:0',
        'delivery_date' => 'date',
        'delivery_time' => 'string',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pickupStore(): BelongsTo
    {
        return $this->belongsTo(StoreLocation::class, 'pickup_store_id');
    }
}
