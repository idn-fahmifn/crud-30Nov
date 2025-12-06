<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route untuk category

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{param}', [CategoryController::class, 'show'])->name('category.show');
Route::put('category/{param}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{param}', [CategoryController::class, 'destroy'])->name('category.destroy');

// route untuk product
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::get('product/{param}', [ProductController::class, 'show'])->name('product.show');
Route::put('product/{param}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{param}', [ProductController::class, 'destroy'])->name('product.destroy');