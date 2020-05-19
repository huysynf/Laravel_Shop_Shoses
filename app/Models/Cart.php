<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'sale_money',
        'total',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_product')->withPivot(['quantity', 'size', 'color']);
    }
}
