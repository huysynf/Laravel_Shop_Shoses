<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use ImageTrait;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'sale',
        'product_key',
        'image',
        'description',
        'status',
        'slug',
        'brand_id'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setProduct_keyAttribute($value)
    {
        $this->attributes['product_key'] = strtoupper($value);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot(['category_id', 'product_id']);

    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function scopeWithName($query, $name)
    {
        $query->when($name,fn($q)=>$q->where('name', 'LIKE', '%' . $name . '%'));
    }

    public function scopeWithCategory($query, $name)
    {
        $query->when($name,
            fn($query, $q) => $query->whereHas('categories', fn($q) => $q->where('name', $name)));
    }

    public function scopeWithSale($query, $sale)
    {
        $query->when($sale,fn($q)=>$q->where('sale', $sale));
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function searchBy(array $searchCondition)
    {
        $categoryName = $searchCondition['category'] ?? null;
        $sale = $searchCondition['sale'] ?? null;
        $name = $searchCondition['name'] ?? null;
        $brandName = $searchCondition['brand'] ?? null;

        return $this->when($categoryName,
            fn($query, $q) => $query->whereHas('categories', fn($q) => $q->where('name', $categoryName)))
            ->when($brandName,
                fn($query, $q) => $query->whereHas('brand', fn($q) => $q->where('name', $brandName)))
            ->withName($name)
            ->withSale($sale)
            ->with('brand')
            ->latest('id')
            ->paginate(10);
    }

    public function getProductByCategoryName($name)
    {
        return $this->withCategory($name)
            ->latest('id')
            ->paginate(10);
    }

    public function scopeWithSlug($query, $slug)
    {
        return $query->where('slug',$slug);
    }
    public function getBy($id)
    {
        return $this->with('images')->with('sizes')->with('categories')->with('brand')->findOrFail($id);
    }

    public function getCategoryIdsBy($id)
    {
        return $this->findOrFail($id)->categories()->pluck('category_id')->toArray();
    }

    public function getBySlug($slug)
    {
        return $this->withSlug($slug)->with('images')->with('sizes')->with('categories')->with('brand')->first();
    }
}
