<?php


namespace App\Repositories\admin;


use App\Models\Brand;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class BrandRepository extends BaseRepository
{

    protected $imagePath;

    public function __construct(Brand $brand)
    {
        $this->model = $brand;
        $this->imagePath='images/brands/';
    }

    public function formatRequest(Request $request):array
    {
        $data=$request->all();
        $data['slug']=$data['name'];

        return  $data;
    }

    public function store(array  $data)
    {
        $image=$data['image']??null;
        $data['image']=$this->model->saveImage($image,$this->imagePath);
        $brand=$this->model->create($data);

        return $brand;
    }

    public function searchBy($name):array
    {
        $data['brands']=$this->model->searchBy($name);

        return $data;
    }
}
