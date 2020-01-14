<?php


namespace App\Repositories\admin;


use App\Models\ProductSize;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ProductSizeRepository extends BaseRepository
{

    public function __construct(ProductSize $productSize)
    {
        $this->model = $productSize;
    }

    public function getSizesBy($productId)
    {
        $sizes=$this->model->getSizesBy($productId);

        return $sizes;
    }

    public function formatRequest(Request $request):array
    {
        $data=$request->all();

        return $data;
    }

    public function store(array $data)
    {
        $size=$this->model->create($data);

        return $size;
    }

}
