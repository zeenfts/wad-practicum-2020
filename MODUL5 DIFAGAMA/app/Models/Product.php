<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'stock', 'img_path',
    ];

    public function order_by()
    {
        return $this->hasMany(Order::class, 'product_id'); //debug
    }
}
