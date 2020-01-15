<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected  $table='product_sizes';

    protected $fillable = [
        'product_id',
        'price',
        'size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function getSizesBy($productId)
    {
        return $this->withProduct_id($productId)->with('colors')->get();
    }

    public function scopeWithProduct_id($query,$product_id)
    {
        $query->when($product_id,fn($q)=>$q->where('product_id',$product_id));
    }

    public function colors()
    {
        return $this->hasMany(ProductSizeColor::class,'product_size_id');
    }

}
