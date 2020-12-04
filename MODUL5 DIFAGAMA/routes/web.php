<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home_prod');
Route::get('/product', [ProductController::class, 'index'])->name('product_list');
Route::get('/history', [OrderController::class, 'index'])->name('history_prod');