<?php


namespace App\Repositories\admin;


use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository
{

    protected $imagePath;

    public function __construct(Product $product)
    {
        $this->model = $product;
        $this->imagePath='images/products/';
    }

    public function formatRequest(Request $request):array
    {
        $data=$request->all();
        $data['slug'] =$data['name'] ??'';

        return $data;
    }

    public function search(array $searchCondition)
    {
        $data['products']=$this->model->searchBy($searchCondition);

        return $data;
    }

    public function create():array
    {
        $data['categories']=$this->category->all(['id','name']);

        return $data;
    }

    public function store(array $data)
    {
        $image =$data['image']??null;
        $data['image']=$this->model->saveImage($image,$this->imagePath);
        $product=$this->model->create($data);
        $product->categories()->sync($data['categories']);

        return $product;
    }

    public function getById($id)
    {
        $product=$this->model->getBy($id);

        return $product;
    }

    public function getCategoryIdsBy($id)
    {
        return $this->model->getCategoryIdsBy($id);
    }
}
