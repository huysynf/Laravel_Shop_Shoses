<?php


namespace App\Repositories\admin;


use App\Models\ProductSize;
use App\Models\ProductSizeColor;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ProductColorRepository extends BaseRepository
{
    protected ProductSize $productSize;

    public function __construct(ProductSizeColor $productSizeColor)
    {
        $this->model=$productSizeColor;
        $this->productSize=new ProductSize();
    }

    public function getSizeBy($productId)
    {
        return $this->productSize->getSizesBy($productId);
    }

    public function store(array  $data)
    {
        $color=$this->model->create($data);

        return $color;
    }

    public function formatRequest(Request $request):array
    {
        $data=$request->all();

        return  $data;
    }

    public function update(array $data,$id)
    {
        $color=$this->model->findOrFail($id);
        $color->update($data);

        return $color;
    }


}
