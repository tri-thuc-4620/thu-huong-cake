<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    protected $fillable = [
        'name', 'short_name', 'address', 'city', 'district', 'phone',
        'latitude', 'longitude', 'google_maps_url',
        'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'latitude'   => 'decimal:7',
        'longitude'  => 'decimal:7',
    ];
}
