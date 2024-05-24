<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('stores')->group(function () {
    Route::get('/', [StoreController::class, 'index'])->name('stores.index');
    Route::get('/create', [StoreController::class, 'create'])->name('stores.create');
    Route::post('/', [StoreController::class, 'store'])->name('stores.store');
});

Route::prefix('attributes')->group(function () {
    Route::get('/', [AttributeController::class, 'index'])->name('attributes.index');
    Route::get('/create', [AttributeController::class, 'create'])->name('attributes.create');
    Route::post('/', [AttributeController::class, 'store'])->name('attributes.store');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
});
