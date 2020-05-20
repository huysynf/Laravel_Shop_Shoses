<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\carts\ApplyCodeRequest;
use App\Http\Requests\carts\CartRequest;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class CartController extends Controller
{

    protected $cart;
    public function __construct(Cart $cart)
    {
        $this->cart =$cart;
    }

    public function index()
    {
        $cartOrders = Auth::guard()->id() ? $this->cart->with(['products','products.sizes'])->where('user_id',auth()->user()->id)->first() : null;

        return view('clients.carts.cart')->with([
            'cartOrders' => $cartOrders,
            'total' => $cartOrders->total ?? 0,
        ]);
    }

    public function addcart(CartRequest $request)
    {
        $data = $request->all();
        $cart = Cart::where('user_id', Auth::guard()->id())->first();
        if (!$cart) {
            $cart = Cart::create(['user_id' => Auth::guard()->id(), 'sale_money' => 0, 'total' => 0]);
        }
        $isProductInCart = $this->checkProducInCart($data, $cart);

        if (!$isProductInCart) {
            CartProduct::create([
                'cart_id' => $cart->id,
                'product_id' => $data['id'],
                'quantity' => 1,
                'size' => $data['size'],
                'color' => $data['color']
            ]);
        } else {
            $cartProduct = CartProduct::where('cart_id', $cart->id)
                ->where('product_id', $data['id'])
                ->where('color', $data['color'])
                ->where('size', $data['size'])->first();
            $quantity = $cartProduct->quantity +1;
            $cartProduct->update(['quantity'=>$quantity]);
        }

        return redirect()->back()->with('message', 'Thêm vào giỏ hàng thành công');
    }


    public function checkProducInCart($data, $cart)
    {
        $cartProduct = CartProduct::where('cart_id', $cart->id)
            ->where('product_id', $data['id'])
            ->where('color', $data['color'])
            ->where('size', $data['size'])->first();

        return $cartProduct != null;
    }

    public function delete($id)
    {
        CartProduct::destroy($id);

        return response()->json([
            'message' => 'Xóa thành công',
        ]);

    }

    public function updateQuantity(Request $request, $id)
    {

        $cartProduct = CartProduct::findOrFail($id);
        $quantity = $request->qty;
        if ($quantity >0)
        {
            $cartProduct->update(['quantity'=>$quantity]);
            return response()->json([
                'status' => 200,
            ]);
        }

        return response()->json([
            'status' => 401,
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
        if ($coupon->status == 0) {
            return redirect()->route('cart.checkout')->with('message', 'Mã giảm giá không tồn tại !');
        }

        if ($coupon->quantity <= 0) {
            return redirect()->route('cart.checkout')->with('message', 'Mã giảm giá hết  !');
        }
        if ($coupon->expiry_date < $now) {
            return redirect()->route('cart.checkout')->with('message', 'Mã giảm giá hết hạn !');
        }
        if ($coupon->type == 'percent') {
            $discount_amount_price = ($total_amount * ($coupon->value / 100));
        } else {
            $discount_amount_price = $coupon->value;
        }

        Session::put('coupon_id', $coupon->id);
        Session::put('discount_amount_price', $discount_amount_price);
        Session::put('coupon_code', $coupon->code);

        return back()->with('message', 'Áp dụng thành công');
    }
}
