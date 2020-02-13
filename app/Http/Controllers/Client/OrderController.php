<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Hash;
use Illuminate\Http\Request;
use Session;
use Auth;

class OrderController extends Controller
{
    protected $order;

    /**
     * OrderController constructor.
     * @param $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function index()
    {
        $cartOrders = \Cart::getContent();
        $totalPro = [];
        $total = 0;
        foreach ($cartOrders as $cart) {
            $total += ($cart->price - ($cart->price * ($cart->attributes->sale / 100))) * $cart->quantity;
        }
        Session::put('totalCart', count($totalPro));
        return view('clients.carts.order')->with([
            'cartOrders' => $cartOrders,
            'total' => $total,

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
        $proIds = [];
        $quantity=[];
        foreach ($cartOrders as $cart) {
            $proIds[] = $cart->attributes->product_id;
            $quantity[]=$cart->quantity;
        }

        $data = $request->all();
        $data['total'] = Session::get('totalCart');
        $data['code'] = $this->generateRandomString();
        $data['status'] = 'Đã nhận được đơn hàng';
        $order = Order::create($data);

        $order->products()->attach($proIds,['quantity'=>$quantity]);

        Session::forget('discount_amount_price');

        Session::forget('coupon_code');

        return redirect()->route('user.order.index')->with('message', 'Tạo đơn hàng thành công ');
    }

    public function getorder()
    {
        $orders = $this->order->with('products')->where('user_id',Auth::guard()->id())->latest('id')->paginate(10);

        return view('clients.carts.order_index', compact('orders'));
    }
}
