<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use ImageTrait;

    protected $table='product_images';

    protected $fillable=[
        'product_id',
        'image',
    ];

    public function scopeWithProduct_id($query,$product_id)
    {
        $query->when($product_id,fn($q)=>$q->where('product_id',$product_id));
    }

    public function getImageBy($productId)
    {
        return $this->withProduct_id($productId)->get();
    }
}
