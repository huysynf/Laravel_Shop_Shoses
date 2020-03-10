<?php


namespace App\Http\Composers\Admin;

use App\Repositories\admin\CategoryRepository;
use Illuminate\View\View;
use Darryldecode\Cart\Cart;
use App\Models\Order;
use Auth;

class CartComposer
{
        protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function compose(View $view){
        $view->with(['carts'=>\Cart::getContent(),'orderCountNew'=>$this->order->countNewOrderBy(Auth::guard()->id())]);

    }
}
