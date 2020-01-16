<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupons\CreateRequest;
use App\Http\Requests\Coupons\UpdateRequest;
use App\Repositories\admin\CouponRepository;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * @var CouponRepository
     */
    protected CouponRepository $couponRepository;


    /**
     * CouponController constructor.
     */
    public function __construct(CouponRepository $couponRepository)
    {

        $this->couponRepository = $couponRepository;
    }

    public function index(Request $request)
    {
        $coupons=$this->couponRepository->getAll();

        return view('admins.coupons.index',compact('coupons'));
    }

    public function create()
    {
        return view('admins.coupons.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $this->couponRepository->formatRequest($request);
        $coupon = $this->couponRepository->store($data);

        return redirect()->route('coupons.create')->with('message', 'Thêm thành công mã' . $coupon->code);

    }

    public function edit($id)
    {
        $coupon = $this->couponRepository->getById($id);

        return view('admins.coupons.edit', compact('coupon'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $this->couponRepository->formatRequest($request);
        $coupon = $this->couponRepository->update($data, $id);

        return redirect()->route('coupons.index')->with('message', 'Cập nhật thành công mã' . $coupon->code);
    }

    public function destroy($id)
    {
        $this->couponRepository->deleteById($id);

        return response()->json([
            'message'=>'Xóa thành công ',
        ]);
    }
}
