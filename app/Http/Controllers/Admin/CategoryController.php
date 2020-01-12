<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\UpdateRequest;
use App\Repositories\admin\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $searchName = $request->input('searchKey');
        $categories = $this->categoryRepository->search($searchName);

        return view('admins.categories.index', compact('categories'));
    }

    public function formatRequest(Request $request)
    {
        return $this->categoryRepository->formatRequest($request);
    }

    public function store(CreateRequest $request)
    {
        $data = $this->formatRequest($request);
        $category = $this->categoryRepository->store($data);

        return response()->json([
            'status' => 200,
            'message' => 'Thêm thành công danh mục: ' . $category->name,
            'data' => $category
        ]);
    }

    public function getAll()
    {
        $categories = $this->categoryRepository->get();

        return response()->json([
            'status' => 200,
            'data' => $categories
        ]);
    }

    public function show($id)
    {
        $category=$this->categoryRepository->getById($id);

        return response()->json([
            'status' => 200,
            'data' =>$category,
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $this->formatRequest($request);
        $category = $this->categoryRepository->update($data,$id);

        return response()->json([
            'status' => 200,
            'message' => 'Cập nhật thành công danh mục: ' . $category->name,
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        $category=$this->categoryRepository->destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Xóa  thành công danh mục: ' . $category->name,
            'data' => $category
        ]);
    }

    public function trash(Request $request)
    {
        $searchName=$request->input('searchKey');
        $categories = $this->categoryRepository->trash($searchName);

        return view('admins.categories.trash', compact('categories'));
    }

    public function trashDeleteAll()
    {
        $categories = $this->categoryRepository->trashDeleteAll();

        return view('admins.categories.trash', compact('categories'));
    }

    public function trashRestoreAll()
    {
        $categories = $this->categoryRepository->trashDeleteAll();

        return view('admins.categories.trash', compact('categories'));
    }

    public function trashDelete($id)
    {
        $categories = $this->categoryRepository->trashDelete($id);

        return response()->json([
        'status'=>200,
        'message'=>'Thành công',
    ]);
    }

    public function trashRestore($id)
    {
        $this->categoryRepository->trashRestore($id);

        return response()->json([
           'status'=>200,
           'message'=>'Thành công',
        ]);

    }
}



