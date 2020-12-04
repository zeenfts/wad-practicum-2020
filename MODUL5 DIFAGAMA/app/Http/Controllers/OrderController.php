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
}
