<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSizeColor extends Model
{
    protected $table='product_size_colors';

    protected $fillable = [
        'product_size_id',
        'color',
        'quantity'
    ];

}
