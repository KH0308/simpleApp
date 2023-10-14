<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ProductColorSizeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//product controller route
Route::get('/product/create_product', [ProductController::class, 'create'])->name('create.product');
Route::post('/product/store/product', [ProductController::class, 'store'])->name('store.product');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{id}/show', [ProductController::class, 'show'])->name('product.show');

//variant controller route
// Route::put('/product/{id}/create_product_variant', [ProductVariantController::class, 'create'])->name('create.product.variant');
Route::get('/product/{id}/create_product_variant', [ProductVariantController::class, 'create'])->name('create.product.variant');
Route::get('/product/{id}/edit/variant', [ProductVariantController::class, 'edit'])->name('product.edit.variant');
Route::delete('/product/{productId}/{id}/variant', [ProductVariantController::class, 'destroy'])->name('product.destroy.variant');
Route::post('/product/store_product_variant', [ProductVariantController::class, 'store'])->name('store.product.variant');
Route::put('/product/{id}', [ProductVariantController::class, 'update'])->name('product.update.variant');

//category controller route
Route::get('/product/create_category', [ProductTypeController::class, 'create'])->name('create.category');
Route::delete('/product/{id}/category', [ProductTypeController::class, 'destroy'])->name('product.destroy.category');
Route::post('/product/store_product', [ProductTypeController::class, 'store'])->name('store.category');

//controller create color n size
Route::get('/product/{id}/create_product_color', [ProductColorSizeController::class, 'createColor'])->name('create.color');
Route::post('/product/{id}/store_product_color', [ProductColorSizeController::class, 'storeColor'])->name('store.color');
Route::delete('/product/{productId}/{id}/color', [ProductColorSizeController::class, 'destroyColor'])->name('product.destroy.color');
Route::get('/product/{id}/create_product_size', [ProductColorSizeController::class, 'createSize'])->name('create.size');
Route::post('/product/{id}/store_product_size', [ProductColorSizeController::class, 'storeSize'])->name('store.size');
Route::delete('/product/{productId}/{id}/size', [ProductColorSizeController::class, 'destroySize'])->name('product.destroy.size');
