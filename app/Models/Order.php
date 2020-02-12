<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_name',
        'user_id',
        'user_email',
        'user_address',
        'user_phone',
        'code',
        'payment',
        'status',
        'ship',
        'total',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order');
    }
}
