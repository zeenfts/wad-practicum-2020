<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

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

    public function add_product()
    {
        return view('prod_add', [
            'product' => new Product,
        ]);
    }

    public function store_product(PostRequest $request)
    {
        $attr = $request->all();
        // Assign title to the slug
        // $attr['slug'] = Str::slug(request('title'));
        // $attr['category_id'] = request('category');

        $attr['name'] = request('name');
        $attr['price'] = request('price');
        $attr['description'] = request('description');
        $attr['stock'] = request('stock');
        $attr['img_path'] = request('img_path');

        // Create new post
        $post = posts()->create($attr);

        $post->tags()->attach(request('tags'));

        // redirect to index
        return redirect()->route('post.index')->with('success', 'The post was created');
    }

    public function edit_product(Product $prods)
    {
        return view('prod_edit', [
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
