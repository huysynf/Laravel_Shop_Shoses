<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeWithName($query, $name)
    {
        return $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function searchBy($name)
    {
        return $this->withName($name)->with('category')->latest('id')->paginate(10);
    }

    public function findOrFail($id)
    {
        return $this->with('category')->findOrFail($id);
    }

}
