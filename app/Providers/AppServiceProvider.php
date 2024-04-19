<?php

namespace App\Providers;

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        View::composer('*', function ($view) {
            $user = Auth::user();
                        $basket = null;
            $articles = null;
            $totalCost = 0;
            $numProductsInBasket = 0;
            if ($user) {
                $basket = $user->panier;

                if ($basket) {
                    $articles = $basket->articles;
                    $numProductsInBasket = $articles->count();
                    foreach ($articles as $article) {
                        $articleCost = $article->pivot->quantity * $article->price;
                        $totalCost += $articleCost;
                    }
                }
            }
            $view->with([
                'basket' => $basket,
                'articles' => $articles,
                'totalCost' => $totalCost,
                'numProductsInBasket' => $numProductsInBasket,
            ]);
        });
    }
}
