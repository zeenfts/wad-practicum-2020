<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function read_products()
    {
        $products = Product::latest()->paginate(12);

        if(request()->is('/')){
            return view('home_prod', compact('products'));

        }else if(request()->is('product')){
            return view('product_list', compact('products'));

        }else if(request()->is('order')){
            return view('order_prod', compact('products'));

        }
    }

    public function add_product()
    {
        return view('secondary/prod_input');
    }

    public function store_product(Request $request)
    {
        if(!$request->hasFile('img_path')){
            $image='';
        }else{
            $image = date('m').date('d').time().'.'.request('img_path')->getClientOriginalExtension();
            $PATH = 'img/'.$image;
            File::put($PATH, file_get_contents(request('img_path')->getRealPath()));
        }
        $attr = new Product();

        $attr->name = request('name');
        $attr->price = request('price');
        $attr->description = request('description');
        $attr->stock = request('stock');
        $attr->img_path = $image;

        if($attr->save()){
            return redirect()->route('product_list')->with('success', 'Product was added');
        }else{
            return redirect()->route('product_list')->with('error', 'Product was not added!!');
        }
    }

    public function edit_product(Product $item)
    {
        // $prod_update = Product::find($id_item);
        return view('secondary/prod_edit', [
            'item' => $item,
            ]);
    }

    public function update_product($item, Request $request)
    {
        $attr = Product::find($item);

        $attr->name = request('name');
        $attr->price = request('price');
        $attr->description = request('description');
        $attr->stock = request('stock');

        if(!$request->hasFile('img_path')){
            $attr->img_path = request('img_hddn');
        }else{
            $image = date('m').date('d').time().'.'.request('img_path')->getClientOriginalExtension();
            $PATH = 'img/'.$image;
            File::put($PATH, file_get_contents(request('img_path')->getRealPath()));

            if(File::exists(public_path('img').'/'.$attr->img_path)){
                File::delete(public_path('img').'/'.$attr->img_path);
            }

            $attr->img_path = $image;
        }

        if($attr->save()){
            return redirect()->route('product_list')->with('success', 'Product was updated');
        }else{
            return redirect()->route('product_list')->with('error', 'Product was not updated!!');
        }
    }

    public function delete_product(Product $item)
    {
        // $prod = Product::find($id_item);
        if(File::exists(public_path('img').'/'.$item->img_path)){
            File::delete(public_path('img').'/'.$item->img_path);
        }
        // else{
        //     dd('File does not exists.');
        // }
        if($item->delete()){
            return redirect(route('product_list'))->with('success', 'Product was deleted');
        }else{
            return redirect(route('product_list'))->with('error', 'Product was not deleted!!');
        }
    }
}
