<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $category;
    protected $product;

    /**
     * HomeController constructor.
     * @param $category
     */
    public function __construct(Category $category,Product $product)
    {
        $this->category = $category;
        $this->product=$product;
    }


    public function index()
    {
        return view('clients.home');
    }


    public function showproduct($slug)
    {
            $category=$this->category->findWithSlug($slug);
            $products=$category->products;
            return view('clients.products.show_product',compact('category'));
    }


    public function productdetail($slug)
    {
        $product=$this->product->getBySlug($slug);
        return view('clients.products.product_detail',compact('product'));
    }

    public function getcolor($id)
    {
            $size=ProductSize::with('colors')->find($id);

            return response()->json(
                ['size'=>$size,]
                );

    }
}

