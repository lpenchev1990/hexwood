<?php

use App\Http\Controllers\Admin\ProductAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

// Front
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\BlogController;

// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductMediaController;
use App\Http\Controllers\Admin\ProductMaterialController;
use App\Http\Controllers\Admin\ColorVariantController;
use App\Http\Controllers\Admin\ColorVariantItemController;

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Front routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/{slug}', [CategoryController::class, 'detail'])->name('category.detail');

// Product
Route::get('/product/{id}', [CategoryController::class, 'productDetail'])->name('product.detail');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('blog.detail');

// Static pages
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // News
        Route::resource('news', NewsController::class);

        // Products
        Route::resource('products', ProductController::class);

        // Product media
        Route::post(
            'products/{product}/media',
            [ProductMediaController::class, 'store']
        )->name('products.media.store');

        Route::get(
            'products/media/{media}/download',
            [ProductMediaController::class, 'download']
        )->name('products.media.download');

        Route::delete(
            'products/media/{media}',
            [ProductMediaController::class, 'destroy']
        )->name('products.media.destroy');

        // Product materials
        Route::post(
            'products/{product}/materials',
            [ProductMaterialController::class, 'store']
        )->name('products.materials.store');

        // Color variants
        Route::resource('color-variants', ColorVariantController::class);

        Route::post(
            'color-variants/{variant}/items',
            [ColorVariantItemController::class, 'store']
        )->name('color-variants.items.store');

        Route::delete(
            'color-variants/items/{item}',
            [ColorVariantItemController::class, 'destroy']
        )->name('color-variants.items.destroy');
        Route::post(
            'products/{product}/admin',
            [ProductAdminController::class, 'store']
        )->name('products.admin.store');
    });
