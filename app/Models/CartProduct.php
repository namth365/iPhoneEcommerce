<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'product_size',
        'product_color',
        'product_quantity',
        'product_price',
    ];
}
