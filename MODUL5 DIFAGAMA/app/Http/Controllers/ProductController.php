<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function read_products()
    {
        $products = Product::all();

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
        $image = time().'.'.request('img_path')->extension();
        request('img_path')->move(public_path('img'), $image);
        
        $attr = new Product();

        $attr->name = request('name');
        $attr->price = request('price');
        $attr->description = request('description');
        $attr->stock = request('stock');
        $attr->img_path = $image;

        $attr->save();

        // Create new post
        // $post = Product->add_product($attr);

        // $post->tags()->attach(request('tags'));

        // redirect to index
        return redirect()->route('product_list')->with('success', 'Product was added');
    }

    public function edit_product(Product $item)
    {
        // $prod_update = Product::find($id_item);
        return view('secondary/prod_edit', [
            'item' => $item,
            ]);
    }

    public function update_product(PostRequest $request, Post $post)
    {
        $attr = $request->all();
        $attr['category_id'] = request('category');

        $post->update($attr);
        $post->orders()->sync(request('item'));

        return redirect()->route('product_list')->with('success', 'The post was updated');
    }

    public function delete_product($id_item)
    {
        $prod = Product::find($id_item);
        $prod->delete();

        return redirect(route('product_list'));
    }
}
