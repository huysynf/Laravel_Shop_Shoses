<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\admin\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admins.categories.index');
    }

    public function formatRequest(Request $request){
       return $this->categoryRepository->formatRequest($request);
    }

    public function store(Request $request)
    {
        $data=$this->formatRequest($request);
        $category=$this->categoryRepository->store($data);
        return response()->json([
           'status'=>200,
           'message'=>'Thêm thành công danh mục: '.$category->name,
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}


function conwayGame($a,$b)
{
    $arr=[];
    $text=$a." ".$b."\n";
    for($i=0;$i<$a;$i++){

        for($j=0;$j<$b;$j++){


            if ($i>0 && $i<3 && $j>2 && $j <5)
            {

                $arr[$i][$j]="*";

            }
            else
            {
                $arr[$i][$j]=".";
            }

        }
    }
    for($i=0;$i<$a;$i++){

        for($j=0;$j<$b;$j++){

            $text.=$arr[$i][$i]." ";

        }

        $text.="\n";

    }


return $text;
}
