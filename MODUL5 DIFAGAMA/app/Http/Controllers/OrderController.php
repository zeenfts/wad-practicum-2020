<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function read_orders()
    {
        $orders = Order::latest()->paginate(21);
        return view('history_prod', compact('orders'));
    }

    public function order_product(Product $prod)
    {
        return view('secondary/prod_order',[
            'prod'=>$prod,
        ]);
    }

    public function history_product($ordr, Request $request)
    {
        $prods = Product::find($ordr);

        $attr = new Order();

        $attr->product_id = $prods->id;
        $attr->amount = request('quantity') * $prods->price;
        $prods->stock -= request('quantity');
        $attr->buyer_name = request('buyer_name');
        $attr->buyer_contact = request('buyer_contact');

        $prods->save();
        $attr->save();

        return redirect()->route('prod_order', $ordr)->with('success', 'Order has been recorder');
    }
}
