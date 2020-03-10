<?php


namespace App\Repositories\admin;


use App\Models\ProductImage;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ProductImageRepository extends BaseRepository
{

    protected  $imagePath;

    public function __construct(ProductImage $productImage)
    {
        $this->model = $productImage;
        $this->imagePath='images/products/';
    }

    public function formatRequest(Request $request)
    {
        $data=$request->all();

        return $data;
    }

    public function store(array $data)
    {
        $images=[];
        foreach ($data['images'] as $image)
        {
            $dataCreate['product_id']=$data['product_id'];
            $dataCreate['image']=$this->model->saveImage($image,$this->imagePath);
            $images[]=$this->model->create($dataCreate);
        }

        return $images;
    }

    public function getImage($productId)
    {
      $images=$this->model->getImageBy($productId);

      return $images;
    }

    public function destroy($id)
    {
        $productImage=$this->getById($id);
        $image=$productImage->image;
        $productImage->delete();
        $this->model->deleteImage($image,$this->imagePath);

        return 'Xóa thành công';
    }
}
