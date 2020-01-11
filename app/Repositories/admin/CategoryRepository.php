<?php

namespace App\Repositories\admin;


use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        $this->model=$category;
    }
    public function formatRequest(Request $request):array {
        $data=$request->all();
        $data['slug']=$data['name'];
        return  $data;
    }

    public function store(array $data)
    {
        $category= $this->model->create($data);
        return $category;
    }

    public function search($searchName)
    {
       $data['category']=$this->model->search($searchName);
       dd($data);
    }


}
