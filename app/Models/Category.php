<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class,'parent_id')->with('categories');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeWithName($query, $name)
    {
        return $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeWithSlug($query, $slug)
    {
        return $query->where('slug',$slug);
    }

    public function searchBy($name)
    {
        return $this->withName($name)->with('category')->latest('id')->paginate(10);
    }

    public function findOrFail($id)
    {
        return $this->with('category')->findOrFail($id);
    }

    public function getAllCategoryWhenSoftDelete($searchName)
    {
        return $this->onlyTrashed()->withName($searchName)->with('category')->latest('id')->paginate();
    }

    public function trashDeleteAll()
    {
        return $this->onlyTrashed()->forceDelete();
    }

    public function trashRestoreAll()
    {
        return $this->onlyTrashed()->restore();
    }

    public function trashDeleteBy($id)
    {
        return $this->onlyTrashed()->findOrFail($id)->forceDelete();
    }

    public function trashRestoreBy($id)
    {
        return $this->onlyTrashed()->findOrFail($id)->restore();
    }
}
