<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
Route::resource('cake-sizes', App\Http\Controllers\Admin\CakeSizeController::class);
Route::resource('cake-bases', App\Http\Controllers\Admin\CakeBaseController::class);
Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
Route::resource('blog-posts', App\Http\Controllers\Admin\BlogPostController::class);
Route::resource('blog-categories', App\Http\Controllers\Admin\BlogCategoryController::class);
Route::resource('hero-slides', App\Http\Controllers\Admin\HeroSlideController::class);
Route::resource('banners', App\Http\Controllers\Admin\BannerController::class);
Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
Route::resource('store-locations', App\Http\Controllers\Admin\StoreLocationController::class);
Route::resource('contact-messages', App\Http\Controllers\Admin\ContactMessageController::class)->only(['index', 'show', 'edit', 'update']);
Route::resource('callback-requests', App\Http\Controllers\Admin\CallbackRequestController::class)->only(['index', 'show', 'edit', 'update']);
Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
