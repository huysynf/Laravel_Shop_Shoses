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
        return $this->belongsToMany(Product::class, 'cart_product')->withPivot(['quantity', 'size', 'color','id']);
    }

    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->products as $item) {
            $total += ($item->sizes->first()->price - ($item->sizes->first()->price * ($item->sale / 100))) * $item->pivot->quantity;
        }
        return $total;
    }
}
