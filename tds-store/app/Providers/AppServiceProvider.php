<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // View::composer(['layouts.master', 'site-public.produits.detail-produit'], function ($view) {
        //     $view->with([
        //     'cartCount' => Cart::getTotalQuantity(),
        //     'cartTotal' => Cart::getTotal(),
        //     ]);
        // });
    }
}
