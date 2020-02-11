<?php


namespace App\Http\Composers\Admin;

use App\Repositories\admin\CategoryRepository;
use Illuminate\View\View;
use Darryldecode\Cart\Cart;

class CartComposer
{


     public function compose(View $view){
        $view->with(['carts'=>\Cart::getContent()]);

    }
}
