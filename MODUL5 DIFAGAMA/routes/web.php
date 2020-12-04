<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home_prod');
Route::get('product', [ProductController::class, 'index'])->name('product_list');
Route::get('order', [ProductController::class, 'order'])->name('order_prod');
Route::get('history', [HistoryController::class, 'index'])->name('history_prod');

// Route::post('delete',[ProductController::class, 'delete_product'])->name('prod_del');
Route::delete('{post:id_item}/delete',[ProductController::class, 'delete_product'])->name('prod_del');