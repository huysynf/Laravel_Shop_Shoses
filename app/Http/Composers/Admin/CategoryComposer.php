<?php


namespace App\Http\Composers\Admin;

use App\Repositories\admin\CategoryRepository;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function compose(View $view){
        $view->with('categories',$this->categoryRepository->get());
    }
}
