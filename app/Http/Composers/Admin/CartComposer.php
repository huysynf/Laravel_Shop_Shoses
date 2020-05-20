<?php


namespace App\Http\Composers\Admin;

use App\Repositories\admin\CategoryRepository;
use Illuminate\View\View;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class CartComposer
{
    protected $order;
    protected $cart;

    public function __construct(Order $order,Cart $cart)
    {
        $this->order = $order;
        $this->cart =$cart;
    }
    public function getCart()
    {
        return Auth::guard()->id() ? $this->cart->with(['products','products.sizes'])->where('user_id',auth()->user()->id)->first() : null;
    }

    public function compose(View $view){
        $view->with(['cart'=>$this->getCart(),'orderCountNew'=>$this->order->countNewOrderBy(Auth::guard()->id())]);

    }
}
