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
            'message' => 'Thêm thành công danh mục: ' . $category->name,
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        //
    }
}


function conwayGame($a, $b)
{
    $arr = [];
    $text = $a . " " . $b . "\n";
    for ($i = 0; $i < $a; $i++) {

        for ($j = 0; $j < $b; $j++) {


            if ($i > 0 && $i < 3 && $j > 2 && $j < 5) {

                $arr[$i][$j] = "*";

            } else {
                $arr[$i][$j] = ".";
            }

        }
    }
    for ($i = 0; $i < $a; $i++) {

        for ($j = 0; $j < $b; $j++) {

            $text .= $arr[$i][$i] . " ";

        }

        $text .= "\n";

    }


    return $text;
}
