<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'name' => 'Blueberries Smoothie with Apple',
            'price' => 11,
            'description' => 'Hmmm, very yummy smoothie made from fresh blueberries and drink it with a fresh apple',
            'stock' => 500,
            'img_path' => 'https://images.unsplash.com/photo-1532301791573-4e6ce86a085f?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80'
        ]);
    }
}
