<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function parent()
    {
        return $this->hasMany(Category::class);
    }

    public function childOf()
    {
        return $this->belongsTo(Category::class);
    }
}
