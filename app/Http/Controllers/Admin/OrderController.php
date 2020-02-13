<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order  $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders=$this->order->with('products')->latest('id')->paginate(10);

        return view('admins.orders.index',compact('orders'));
    }


    public function show($id)
    {
        $order=$this->order->findOrFail($id);

        return response()->json([
           'data'=>$order,
        ]);
    }

    public function update(Request $request, $id)
    {
        $order=$this->order->findOrFail($id);
        $order->update([
           'status'=>$request->status,
        ]);

        return response()->json([
            'message'=>'Cập nhật đơn hàng thành công ',
            'status'=>200,
        ]);
    }
}
