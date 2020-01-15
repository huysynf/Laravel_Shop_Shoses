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

    public function show($id)
    {
        $color=$this->productColorRepository->getById($id);

        return response()->json([
            'status'=>200,
            'data'=>$color,
        ]);
    }

    public function update(CreateColorRequest $request,$id)
    {
            $data=$this->productColorRepository->formatRequest($request);
            $color=$this->productColorRepository->update($data,$id);

        return response()->json([
            'status'=>200,
            'message'=>'Cập nhật thành công ',
            'data'=>$color,
        ]);
    }

    public function destroy($id)
    {
        $this->productColorRepository->deleteById($id);

        return response()->json([
            'status'=>200,
            'message'=>'Xóa thành thành công ',
        ]);
    }
}
