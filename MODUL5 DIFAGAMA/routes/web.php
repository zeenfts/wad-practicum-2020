<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home_prod');
Route::get('product', [ProductController::class, 'read_products'])->name('product_list');
Route::get('order', [ProductController::class, 'order'])->name('order_prod');
Route::get('history', [OrderController::class, 'read_orders'])->name('history_prod');

Route::get('{post:prods}/edit', [ProductController::class, 'edit_product'])->name('prod_edit');
Route::patch('{post:prods}/edit', [ProductController::class, 'update_product'])->name('prod_update');
Route::delete('{post:id_item}/delete',[ProductController::class, 'delete_product'])->name('prod_del');