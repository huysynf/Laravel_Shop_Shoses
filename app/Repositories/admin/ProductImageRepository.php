<?php


namespace App\Repositories\admin;


use App\Models\ProductImage;
use App\Repositories\BaseRepository;

class ProductImageRepository extends BaseRepository
{

    protected ProductImage $productImage;

    public function __construct(ProductImage $productImage)
    {
        $this->productImage = $productImage;
    }

    public function store($data):ProductImage
    {

    }

    public function getImage($productId)
    {
      $images=$this->model->getImageBy($productId);
      dd($images);
      return $images;
    }
}
