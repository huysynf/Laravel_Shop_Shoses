<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\CreateRequest;
use App\Repositories\admin\BrandRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index(Request $request)
    {
        $name = $request->input('name');
        $data = $this->brandRepository->searchBy($name);

        return view('admins.brands.index')->with(['brands' => $data['brands']]);
    }

    public function store(CreateRequest $request)
    {
        $data = $this->brandRepository->formatRequest($request);
        $brand = $this->brandRepository->store($data);

        return response()->json([
            'status' => 200,
            'message' => 'Thêm thành công thương hiệu mới:' . $brand->name,
            'data' => $brand,
        ]);
    }

    public function show($id)
    {
        $brand = $this->brandRepository->getById($id);

        return response()->json([
            'status' => 200,
            'data' => $brand,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $this->brandRepository->formatRequest($request);
        $brand = $this->brandRepository->update($data, $id);

        return response()->json([
            'status' => 200,
            'message' => 'Cập nhật thành công thương hiệu mới:' . $brand->name,
            'data' => $brand,
        ]);
    }

    public function destroy($id)
    {
        $brand = $this->brandRepository->destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Cập nhật thành công thương hiệu mới:' . $brand->name,
        ]);
    }
}
