<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'buyer_name', 'buyer_contact',
    ];

    public function orders()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
