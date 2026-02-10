<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share cart count with selected views (optimized)
        View::composer(['layouts.*', 'products.*', 'cart.*'], function ($view) {

            // If session not started, return 0
            if (!session()->isStarted()) {
                $view->with('cartCount', 0);
                return;
            }

            $sessionId = session()->getId();

            try {
                $cartCount = Cache::remember(
                    "cart_count_{$sessionId}",
                    now()->addMinutes(5),
                    fn () => app(CartService::class)->getCartCount()
                );
            } catch (\Throwable $e) {
                $cartCount = 0;
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
