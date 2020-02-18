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
        return $this->belongsToMany(Product::class, 'product_order')->withPivot(['quantity','color','size']);
    }


    public function getOrderBy($user_id)
    {
        return $this->with('products')->where('user_id',$user_id)->latest()->get();
    }

    public function countNewOrderBy($user_id)
    {
        return $this->getOrderBy($user_id)->where('status','Đã nhận được đơn hàng')->count();
    }
}
