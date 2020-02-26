<?php

namespace App\Http\Controllers\Client;

use App\Events\OrderShipped;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use Hash;
use Illuminate\Http\Request;
use Session;
use Auth;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function getOrderForm()
    {
        $cartOrders = \Cart::getContent();
        $totalPro = [];
        $total = 0;
        foreach ($cartOrders as $cart) {
            $total += ($cart->price - ($cart->price * ($cart->attributes->sale / 100))) * $cart->quantity;
        }
        Session::put('totalCart', count($totalPro));
        $discount_amount_price= Session::get('discount_amount_price')??0;

        return view('clients.orders.create')->with([
            'cartOrders' => $cartOrders,
            'total' => $total,
            'discount_price'=>$discount_amount_price,
        ]);

    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function store(Request $request)
    {
        $cartOrders = \Cart::getContent();
        $totalPro = [];
        $total = 0;
        foreach ($cartOrders as $cart) {
            $total += ($cart->price - ($cart->price * ($cart->attributes->sale / 100))) * $cart->quantity;
        }
        $discount_amount_price= Session::get('discount_amount_price')??0;
        $totalCart=$total;
        if($discount_amount_price >1)
        {
            $totalCart=$total-$discount_amount_price;
        }

        $cartOrders = \Cart::getContent();
        $proIds = [];
        $quantities=[];
        $colors=[];
        $sizes=[];
        foreach ($cartOrders as $cart) {
            $proIds[] = $cart->attributes->product_id;
            $quantities[]=$cart->quantity;
            $colors[] =$cart->attributes->color;
            $sizes[] =$cart->attributes->size;
        }

        $data = $request->all();
        $data['total'] = $totalCart;
        $data['code'] = $this->generateRandomString();
        $data['status'] = 'Đã nhận được đơn hàng';
        $order = Order::create($data);

        foreach ($proIds as $key=> $prodId)
        {
            $order->products()->attach(
                $prodId,[
                    'quantity'=>$quantities[$key],
                    'color'=>$colors[$key],
                    'size'=>$sizes[$key],
                ]
            );
        }
       if(Session::has('coupon_code')){
       $coupon = Coupon::where('id',Session::get('coupon_code'))->first();
        if ($coupon->quantity > 0) {
            $coupon->update([
                'quantity' => $coupon->quantity - 1,
            ]);
        }
    }
        Session::forget('discount_amount_price');
        Session::forget('coupon_id');

        Session::forget('coupon_code');

        return redirect()->route('user.order.index')->with('message', 'Tạo đơn hàng thành công ');
    }

    public function index()
    {
        $orders = $this->order->with('products')->where('user_id',Auth::guard()->id())->latest('id')->paginate(10);

        return view('clients.orders.index', compact('orders'));
    }

    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json([
           'message'=>'Hủy đơn hàng thành công '
        ]);
    }

    public function ship($orderId)
    {
        $order=$this->order->findOrFail($orderId);

        event(new OrderShipped($order));
    }

}
