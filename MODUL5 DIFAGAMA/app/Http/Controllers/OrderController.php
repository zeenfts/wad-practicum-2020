<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function read_orders()
    {
        $orders = Order::all();
        return view('history_prod', compact('orders'));
    }

    public function order_product(Product $prod)
    {
        return view('secondary/prod_order',[
            'prod'=>$prod,
        ]);
    }

    public function history_product()
    {
        // return view('secondary/prod_h');
    }
}
