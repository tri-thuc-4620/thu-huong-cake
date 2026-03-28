<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function clear()
    {
        // Clear application cache
        Cache::flush();

        // Clear Laravel caches
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');

        return redirect()->back()->with('success', 'Da xoa toan bo cache thanh cong!');
    }

    public function clearFrontend()
    {
        // Clear only frontend cache keys
        $keys = [
            'home_slides', 'home_banners', 'menu_categories',
            'home_featured', 'home_hot', 'home_new', 'home_latest',
            'home_blog', 'all_stores',
        ];

        foreach ($keys as $key) {
            Cache::forget($key);
        }

        return redirect()->back()->with('success', 'Da xoa cache trang ngoai thanh cong!');
    }
}
