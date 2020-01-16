<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateSizeProduct;
use App\Repositories\admin\ProductSizeRepository;

class ProductSizeController extends Controller
{

    protected ProductSizeRepository $productSizeRepository;

    public function __construct(ProductSizeRepository $productSizeRepository)
    {
        $this->productSizeRepository = $productSizeRepository;
    }

    public function getSize($productId)
    {
        $sizes = $this->productSizeRepository->getSizesBy($productId);

        return response()->json([
            'status' => 200,
            'data' => $sizes,
        ]);
    }

    public function store(CreateSizeProduct $request)
    {
        $data = $this->productSizeRepository->formatRequest($request);
        $size = $this->productSizeRepository->store($data);

        return response()->json([
            'status' => 200,
            'message' => 'Thêm kích cỡ thành công: ' . $size->size,
            'data' => $size,
        ]);
    }

    public function destroy($id)
    {
        $this->productSizeRepository->deleteById($id);

        return response()->json([
            'status' => 200,
            'message' => 'Xóa thành công',
        ]);
    }
}
