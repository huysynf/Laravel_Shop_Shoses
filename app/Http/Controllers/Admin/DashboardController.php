<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Role;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public  function  index(){
        $userCount=User::count();
        $productCount=Product::count();
        $brandCount=Brand::count();
        $categoryCount=Category::count();
        $couponCount=Coupon::count();
        $slideCount=Slide::count();
        $roleCount=Role::count();
        return view('admins.dashboard',compact('userCount','productCount','brandCount','categoryCount','couponCount','slideCount','roleCount'));
    }
}
