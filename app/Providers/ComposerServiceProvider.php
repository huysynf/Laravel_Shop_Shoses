<?php

namespace App\Providers;

use App\Http\Composers\Admin\BrandComposer;
use App\Http\Composers\Admin\CategoryComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['admins.categories.form','admins.products.create','admins.products.edit','admins.products.index',],
            CategoryComposer::class
        );
        View::composer(
            ['admins.products.create','admins.products.edit','admins.products.index',],
            BrandComposer::class
        );
    }
}
