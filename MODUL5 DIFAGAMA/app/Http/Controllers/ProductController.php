<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function read_products()
    {
        $products = Product::all();
        return view('product_list', compact('products'));
    }

    public function order()
    {
        $products = Product::all();
        return view('order_prod', compact('products'));
    }

    public function edit_product(Product $prods)
    {
        return view('product_list', [
            'name' => $prods->name,
            'description' => $prods->description,
            'price' => $prods->price,
            'stock' => $prods->stock
        ]);
    }

    public function update_product(PostRequest $request, Post $post)
    {
        $attr = $request->all();
        $attr['category_id'] = request('category');

        $post->update($attr);
        $post->tags()->sync(request('tags'));

        return redirect()->route('post.index')->with('success', 'The post was updated');
    }

    public function delete_product($id_item)
    {
        $prod = Product::find($id_item);
        $prod->delete();

        return redirect(route('product_list'));
    }
}