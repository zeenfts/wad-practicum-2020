<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', [ProductController::class, 'read_products'])->name('history_prod');
Route::get('product', [ProductController::class, 'read_products'])->name('product_list');
Route::get('order', [ProductController::class, 'read_products'])->name('order_prod');
Route::get('history', [OrderController::class, 'read_orders'])->name('history_prod');

Route::get('create', [ProductController::class, 'add_product'])->name('prod_add');
Route::post('create', [ProductController::class, 'store_product'])->name('prod_store');
Route::get('{item:id}/edit', [ProductController::class, 'edit_product'])->name('prod_edit');
Route::patch('{id}/edit', [ProductController::class, 'update_product'])->name('prod_update');
Route::delete('{item:id}/delete',[ProductController::class, 'delete_product'])->name('prod_del');

Route::get('{prod:id}/order', [OrderController::class, 'order_product'])->name('prod_order');
Route::post('{id}/order', [OrderController::class, 'history_product'])->name('prod_hist');