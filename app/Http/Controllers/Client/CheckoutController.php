<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Session;
class CheckoutController extends Controller
{
    public function index()
    {
        $cartOrders = \Cart::getContent();
        $cartTotal = \Cart::getTotal();
        $totalPro = [];
        $total = 0;
        foreach ($cartOrders as $cart) {
            $total += ($cart->price - ($cart->price * ($cart->attributes->sale / 100))) * $cart->quantity;
        }
        Session::put('totalCart', count($totalPro));
        return view('clients.carts.checkout')->with([
            'cartOrders' => $cartOrders,
            'total' => $total,
        ]);

    }


}
