<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/product/{id}', [PageController::class, 'productDetail'])->name('product.detail');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/stores', [PageController::class, 'stores'])->name('stores');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [PageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/guide', [PageController::class, 'guide'])->name('guide');

Route::prefix('admin')->name('admin.')->group(base_path('routes/admin.php'));
