<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use Hash;
use Illuminate\Http\Request;
use Session;
use Auth;

class OrderController extends Controller
{
    protected $order;
    protected $cart;

    public function __construct(Order $order,Cart $cart)
    {
        $this->order = $order;
    }


    public function getOrderForm()
    {
        $cartOrders = Auth::guard()->id() ? $this->cart->with(['products','products.sizes'])->where('user_id',auth()->user()->id)->first() : null;
        $totalPro = [];
        $total = $cartOrders->total ?? 0;

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
        $cartOrders = Auth::guard()->id() ? $this->cart->with(['products','products.sizes'])->where('user_id',auth()->user()->id)->first() : null;
        $totalPro = [];
        $total =$cartOrders->total ??0;

        $discount_amount_price= Session::get('discount_amount_price')??0;
        $totalCart=$total;
        if($discount_amount_price >1)
        {
            $totalCart=$total - $discount_amount_price;
        }

        $cartOrders = Auth::guard()->id() ? $this->cart->with(['products','products.sizes'])->where('user_id',auth()->user()->id)->first() : null;
        $proIds = [];
        $quantities=[];
        $colors=[];
        $sizes=[];
        foreach ($cartOrders->products as $item) {
            $proIds[] = $item->id;
            $quantities[]=$item->pivot->quantity;
            $colors[] =$item->pivot->color;
            $sizes[] =$item->pivot->size;
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
       $coupon = Coupon::where('code',Session::get('coupon_code'))->first();

        if ($coupon->quantity > 0) {
            $coupon->update([
                'quantity' => $coupon->quantity - 1,
            ]);
        }
    }
        Session::forget('discount_amount_price');
        Session::forget('coupon_id');

        Session::forget('coupon_code');
        $cart = $this->cart->where('user_id',Auth::guard()->id())->first();
        if($cart)
        {
            Cart::destroy($cart->id);
        }
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

}
