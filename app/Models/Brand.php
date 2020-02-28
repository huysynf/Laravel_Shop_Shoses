<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use  ImageTrait;

    protected $table='brands';

    protected $fillable=[
      'name',
      'slug',
      'image'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function scopeWithName($query, $name)
    {
        $query->when($name, fn($q) => $q->where('name', 'LIKE', '%' . $name . '%'));
    }

    public function searchBy($name)
    {
        return $this->withName($name)
                    ->latest('id')
                    ->paginate(10);
    }
}
