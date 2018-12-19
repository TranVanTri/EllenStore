<?php

namespace App\Providers;

use App\CategoryGroup;
use App\CategoryProduct;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);

        $cateGroup = CategoryGroup::where('enable',1)->get();
        view()->share('cateGroup', $cateGroup);
        $cateProduct = CategoryProduct::where('enable',1)->get();
        view()->share('cateProduct', $cateProduct);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
