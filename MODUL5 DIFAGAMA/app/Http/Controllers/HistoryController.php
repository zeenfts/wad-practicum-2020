<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('history_prod', compact('orders'));
    }
}
