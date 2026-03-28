<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

// Frontend routes (public)
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/product/{id}', [PageController::class, 'productDetail'])->name('product.detail');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/stores', [PageController::class, 'stores'])->name('stores');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [PageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/guide', [PageController::class, 'guide'])->name('guide');

// Customer dashboard (after login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';

// Admin routes
Route::prefix('admin')->name('admin.')->group(base_path('routes/admin.php'));
