<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'title',
        'image',
        'url',
        'position',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'position' => 'string',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
