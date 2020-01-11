<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function parents()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function childOf()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeWithName($query,$name){
        return $query->where('name','LIKE','%'.$name.'%');
    }

    public function searchBy($name)
    {
       // return $this->withName($name)->with()
    }

}
