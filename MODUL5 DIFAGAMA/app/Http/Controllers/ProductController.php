<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product_list', compact('products'));
    }

    public function order()
    {
        $products = Product::all();
        return view('order_prod', compact('products'));
    }

    public function delete_product()
    {
        $prod = Product::find(request('id_item'));
        $prod->delete();

        return redirect(route('product_list'));
    }
}
