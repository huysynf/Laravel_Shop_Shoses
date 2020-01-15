<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateColorRequest;
use App\Repositories\admin\ProductColorRepository;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{

    protected ProductColorRepository $productColorRepository;

    public function __construct(ProductColorRepository $productColorRepository)
    {
        $this->productColorRepository = $productColorRepository;
    }

    public function create($id)
    {
        $sizes=$this->productColorRepository->getSizeBy($id);

        return view('admins.products.product_color',compact('sizes'));
    }

    public function store(CreateColorRequest $request)
    {
            $data=$this->productColorRepository->formatRequest($request);
            $color=$this->productColorRepository->store($data);

            return response()->json([
               'status'=>200,
               'message'=>'Thêm thành công ',
               'data'=>$color,
            ]);
    }
}
