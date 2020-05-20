<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Session;
use Auth;
class CheckoutController extends Controller
{
    protected $cart;
    public function __construct(Cart $cart)
    {
        $this->cart =$cart;
    }

    public function index()
    {
        $cartOrders = Auth::guard()->id() ? $this->cart->with(['products','products.sizes'])->where('user_id',auth()->user()->id)->first() : null;

        return view('clients.carts.checkout')->with([
            'cartOrders' => $cartOrders,
            'total' => $cartOrders->total ?? 0,
        ]);
    }
}
