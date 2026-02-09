<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Global cart count for all views (navbar badge)
        View::composer('*', function ($view) {
            $view->with(
                'cartCount',
                app(CartService::class)->getCartCount()
            );
        });
    }
}
