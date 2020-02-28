<?php


namespace App\Repositories\admin;


use App\Models\Coupon;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class CouponRepository extends BaseRepository
{

    public function __construct(Coupon $coupon)
    {
        $this->model=$coupon;

    }

    public function getAll()
    {
        return $this->model->paginate(10);
    }

    public function formatRequest(Request $request)
    {
        $data=$request->all();

        return $data;
    }

    public function store(array  $data)
    {
        $coupon=$this->model->create($data);

        return $coupon;
    }

    public function update(array  $data,$id)
    {
        $coupon=$this->getById($id);
        $coupon->update($data);

        return $coupon;
    }
}
