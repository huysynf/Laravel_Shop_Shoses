<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    private  Product $product;

    /**
     * SearchController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function index(Request $request)
   {
        $search = $request->all();
        $products = $this->product->searchBy($search);

        return view('clients.search.search',compact('products'));
   }
}
