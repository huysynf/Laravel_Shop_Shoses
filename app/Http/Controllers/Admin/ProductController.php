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
            'categories' => $data['categories'],
            'products' => $data['products'],
        ]);
    }


    public function create()
    {
        $data = $this->productRepository->create();

        return view('admins.products.create')->with(['categories' => $data['categories']]);
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
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(UpdateRequest $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
