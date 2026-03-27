<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    protected $table = 'store_locations';

    protected $fillable = [
        'name',
        'short_name',
        'address',
        'city',
        'district',
        'phone',
        'latitude',
        'longitude',
        'google_maps_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
