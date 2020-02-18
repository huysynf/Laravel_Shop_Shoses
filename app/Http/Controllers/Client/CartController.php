<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\carts\ApplyCodeRequest;
use App\Http\Requests\carts\CartRequest ;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class CartController extends Controller
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

        Session::put('totalCart', $total);
        return view('clients.carts.cart')->with([
            'cartOrders' => $cartOrders,
            'total' => $total,
        ]);
    }

    public function addcart(CartRequest $request)
    {
        $data = $request->all();
        Session::forget('discount_amount_price');

        Session::forget('coupon_code');

        $session_id = Session::get('session_id');

        if (empty($session_id)) {
            $session_id = Str::random(40);
            Session::put('session_id', $session_id);
        }
        $product = Product::findOrFail($data['id']);
        $productSize = $product->sizes->first();
        if ($request->size == null) {

            $size = $productSize->size ?? 30;
        } else {
            $size = $request->size;
        }

        $qty = $request->qty ?? 1;

        $color = $data['color'];
        $price = ($product->sale > 0) ? (ceil($productSize->price - ($product->price * $product->sale) / 100)) : $productSize->price;
        $id = $data['id'] . $size;
        $cart = \Cart::get($id);
        if ($cart == null) {
            \Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'quantity' => $qty,
                'price' => $price,
                'attributes' => [
                    'size' => $size,
                    'email' => 'haqhuy1999@gmail.com',
                    'session_id' => $session_id,
                    'sale' => $product->sale,
                    'color' => $color,
                    'product_id' => $data['id'],
                    'image' => $product->image,
                ],
            ));
        } else {
            $quantity = $cart->quantity;
            \Cart::update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity + $qty,
                ],
            ]);

        }
        return redirect()->back()->with('message', 'Thêm vào giỏ hàng thành công');
    }


    public function delete( $id)
    {
        \Cart::remove($id);
        return response()->json([
            'message' => 'Xóa thành công',
        ]);

    }

    public function updateQuantity(Request $request, $id)
    {
        \Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->qty,
            ],
        ]);

        return response()->json([
            'status' => 200,
        ]);
    }

    public function deleteItem($id)
    {
        \Cart::remove($id);
        return response()->json([
            'message' => 'Xóa thành công',
        ]);
    }

    public function applyCoupon(ApplyCodeRequest $request)
    {

        $coupon_code = Str::upper($request->input('coupon_code'));

        $total_amount = $request->input('Total_amountPrice');

        $coupon = Coupon::where('code', $coupon_code)->first();

        if ($coupon == null) {

            return redirect()->route('cart.checkout')->with('message', 'Mã giảm giá không tồn tại !');
        }

        $now = date('Y-m-d');
        if($coupon->status ==0) {
            return redirect()->route('cart.checkout')->with('message', 'Mã giảm giá không tồn tại !');
        }

        if($coupon->quantity <= 0) {
            return redirect()->route('cart.checkout')->with('message', 'Mã giảm giá hết  !');
        }
        if( $coupon->expiry_date < $now) {
            return redirect()->route('cart.checkout')->with('message', 'Mã giảm giá hết hạn !');
        }
        if($coupon->type=='percent')
        {
            $discount_amount_price = ($total_amount * ($coupon->value / 100));
        }
        else
        {
            $discount_amount_price = $coupon->value;
        }

        Session::put('coupon_id', $coupon->id);
        Session::put('discount_amount_price', $discount_amount_price);
        Session::put('coupon_code', $coupon->code);

        return back()->with('message', 'Áp dụng thành công');
    }
}
