<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Repositories\admin\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $searchCondition = $this->productRepository->formatRequest($request);
        $data = $this->productRepository->search($searchCondition);

        return view('admins.products.index')->with([
            'products' => $data['products'],
        ]);
    }

    public function create()
    {
        return view('admins.products.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $this->productRepository->formatRequest($request);
        $product = $this->productRepository->store($data);

        return redirect()->route('products.create')->with('message',
            'Thêm mới sản phẩm ' . $product->name . ' thành công');
    }

    public function show($id)
    {
        return response()->json([
            'status' => 200,
            'data' => $this->productRepository->getById($id),
        ]);
    }

    public function edit($id)
    {
        $product=$this->productRepository->getById($id);
        $categoryIds=$this->productRepository->getCategoryIdsBy($id);

        return view('admins.products.edit',compact('product','categoryIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $this->productRepository->formatRequest($request);
        $product = $this->productRepository->update($data, $id);

        return redirect()->route('products.index')->with('message',
            'Cập nhật sản phẩm ' . $product->name . ' thành công');
    }

    public function destroy($id)
    {
        $message=$this->productRepository->destroy($id);

        return response()->json([
            'status'=>200,
            'message'=>$message
        ]);
    }
}
