<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\isEmpty;
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

    public function store_product()
    {
        $image = date('m').date('d').time().'.'.request('img_path')->getClientOriginalExtension();
        $PATH = 'img/'.$image;
        File::put($PATH, file_get_contents(request('img_path')->getRealPath()));
        
        $attr = new Product();

        $attr->name = request('name');
        $attr->price = request('price');
        $attr->description = request('description');
        $attr->stock = request('stock');
        $attr->img_path = $image;

        $attr->save();

        return redirect()->route('product_list')->with('success', 'Product was added');
    }

    public function edit_product(Product $item)
    {
        // $prod_update = Product::find($id_item);
        return view('secondary/prod_edit', [
            'item' => $item,
            ]);
    }

    public function update_product(Product $attr, Request $request)
    {
        $attr->name = request('name');
        $attr->price = request('price');
        $attr->description = request('description');
        $attr->stock = request('stock');

        if($request->hasFile('img_path')){
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

        $attr->update();

        return redirect()->route('product_list')->with('success', 'Product was updated');
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
        $item->delete();

        return redirect(route('product_list'))->with('success', 'Product was deleted');
    }
}
