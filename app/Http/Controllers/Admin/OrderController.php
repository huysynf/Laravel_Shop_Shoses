<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderShipped;
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
            'message'=>'Cập nhật đơn hàng thành công',
            'status'=>200,
        ]);
    }

    public function ship(Request $request,$orderId)
    {
        $order = $this->order->findOrFail($orderId);
        event(new OrderShipped($order));
    }


    public function getship($id)
    {
        $order=$this->order->findOrFail($id);
        return view('admins.orders.ship',compact('order'));
    }
}
