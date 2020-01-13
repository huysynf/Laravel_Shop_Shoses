<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\admin\ProductImageRepository;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{

    protected ProductImageRepository $productImageRepository;


    public function __construct(ProductImageRepository $productImageRepository)
    {
        $this->productImageRepository = $productImageRepository;
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function getImage($id)
    {

    }
}
