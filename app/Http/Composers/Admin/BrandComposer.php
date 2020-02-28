<?php


namespace App\Http\Composers\Admin;

use App\Repositories\admin\BrandRepository;
use App\Repositories\admin\CategoryRepository;
use Illuminate\View\View;

class BrandComposer
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function compose(View $view){
        $view->with('brands',$this->brandRepository->get());
    }
}
