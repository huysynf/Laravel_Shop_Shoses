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
        $data = $this->productImageRepository->formatRequest($request);
        $images = $this->productImageRepository->store($data);

        return response()->json([
            'status' => 200,
            'message' => 'Thêm hình ảnh thành công',
            'data' => $images,
        ]);
    }

    public function getImage($id)
    {
        $images = $this->productImageRepository->getImage($id);

        return response()->json([
            'status' => 200,
            'data' => $images,
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'status' => 200,
            'message' => $this->productImageRepository->destroy($id),
        ]);
    }
}
