<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'badge_text', 'title_line_1', 'title_line_2', 'description',
        'button_1_text', 'button_1_url', 'button_2_text', 'button_2_url',
        'image', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
