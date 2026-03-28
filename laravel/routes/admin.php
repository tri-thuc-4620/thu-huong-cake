<?php

use Illuminate\Support\Facades\Route;

// Protected admin routes (login tai /login chung)
Route::middleware('admin')->group(function () {

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // San pham
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class)->middleware('can:products.view');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)->middleware('can:categories.view');
    Route::resource('attributes', App\Http\Controllers\Admin\AttributeController::class)->except(['show'])->middleware('can:attributes.view');
    Route::resource('price-tables', App\Http\Controllers\Admin\PriceTableController::class)->middleware('can:price-tables.view');
    Route::get('attributes/{attribute}/values', [App\Http\Controllers\Admin\AttributeController::class, 'values'])->name('attributes.values')->middleware('can:attributes.view');
    Route::post('attributes/{attribute}/values', [App\Http\Controllers\Admin\AttributeController::class, 'storeValue'])->name('attributes.values.store')->middleware('can:attributes.create');
    Route::delete('attributes/{attribute}/values/{value}', [App\Http\Controllers\Admin\AttributeController::class, 'destroyValue'])->name('attributes.values.destroy')->middleware('can:attributes.delete');

    // Don hang
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->middleware('can:orders.view');

    // Noi dung
    Route::resource('blog-posts', App\Http\Controllers\Admin\BlogPostController::class)->middleware('can:blog.view');
    Route::resource('blog-categories', App\Http\Controllers\Admin\BlogCategoryController::class)->middleware('can:blog.view');
    Route::resource('hero-slides', App\Http\Controllers\Admin\HeroSlideController::class)->middleware('can:sliders.view');
    Route::resource('banners', App\Http\Controllers\Admin\BannerController::class)->middleware('can:banners.view');
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class)->middleware('can:pages.view');

    // Cua hang
    Route::resource('store-locations', App\Http\Controllers\Admin\StoreLocationController::class)->middleware('can:stores.view');

    // Lien he
    Route::resource('contact-messages', App\Http\Controllers\Admin\ContactMessageController::class)->only(['index', 'show', 'edit', 'update'])->middleware('can:contacts.view');
    Route::resource('callback-requests', App\Http\Controllers\Admin\CallbackRequestController::class)->only(['index', 'show', 'edit', 'update'])->middleware('can:contacts.view');

    // He thong
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->except(['show'])->middleware('can:roles.view');
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index')->middleware('can:settings.view');
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update')->middleware('can:settings.edit');

}); // end admin middleware
