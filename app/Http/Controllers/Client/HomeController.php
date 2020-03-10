<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateClientRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\User;


class HomeController extends Controller
{
    protected $category;
    protected $product;
    protected $user;

    public function __construct(Category $category, Product $product,User $user)
    {
        $this->category = $category;
        $this->product = $product;
        $this->user=$user;
    }


    public function index()
    {
        $newProducts=$this->product->latest('id')->paginate(20);
        $menProducts=$this->product->getProductByCategoryName('Giày nam');
        $girlProducts=$this->product->getProductByCategoryName('Giày nữ');
        $saleProducts=$this->product->where('sale','>',0)->paginate(20);
        return view('clients.home',compact('newProducts','menProducts','girlProducts','saleProducts'));
    }


    public function showproduct($slug)
    {
        $category = $this->category->findWithSlug($slug);
        $products = $category->products;
        return view('clients.products.show_product', compact('category'));
    }


    public function productdetail($slug)
    {
        $product = $this->product->getBySlug($slug);
        return view('clients.products.product_detail', compact('product'));
    }

    public function getcolor($id)
    {
        $size = ProductSize::with('colors')->find($id);

        return response()->json(
            ['size' => $size,]
        );

    }


    public function info()
    {
        return view('clients.info.info');
    }

    public function contact()
    {
        return view('clients.contacts.contact');
    }
    public function account()
    {
        return view('clients.account.account');
    }

    public function accountUpdate(UpdateClientRequest $request ,$id)
    {
        $data=$request->all();
        $user = $this->user->findOrFail($id);

        $image = $data['image'] ?? null;
        $data['image'] = $this->user->updateImage($image,'images/users/', $user->image);
        $user->update($data);
        return redirect()->route('home.account')->with('message','Cập nhật thành công ');
    }
}

