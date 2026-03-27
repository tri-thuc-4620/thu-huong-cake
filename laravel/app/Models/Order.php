<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_phone',
        'customer_email',
        'delivery_type',
        'delivery_address',
        'pickup_store_id',
        'delivery_date',
        'delivery_time',
        'note',
        'gift_recipient_name',
        'gift_recipient_phone',
        'subtotal',
        'shipping_fee',
        'discount',
        'total',
        'payment_method',
        'status',
        'cancel_reason',
        'admin_note',
    ];

    protected $casts = [
        'delivery_type' => 'string',
        'delivery_date' => 'date',
        'subtotal' => 'decimal:2',
        'shipping_fee' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
        'payment_method' => 'string',
        'status' => 'string',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function pickupStore(): BelongsTo
    {
        return $this->belongsTo(StoreLocation::class, 'pickup_store_id');
    }
}
