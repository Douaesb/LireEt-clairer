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
        // Define a view composer for all views
        View::composer('*', function ($view) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Initialize variables
            $basket = null;
            $articles = null;
            $totalCost = 0;
            $numProductsInBasket = 0;

            // Check if the user is authenticated
            if ($user) {
                // Get the user's basket
                $basket = $user->panier;

                // Check if the basket exists
                if ($basket) {
                    // Get the articles in the basket
                    $articles = $basket->articles;
                    // Calculate the total cost and the number of products in the basket
                    $numProductsInBasket = $articles->count();
                    foreach ($articles as $article) {
                        $articleCost = $article->pivot->quantity * $article->price;
                        $totalCost += $articleCost;
                    }
                }
            }

            // Pass the basket, articles, total cost, and number of products in the basket to the view
            $view->with([
                'basket' => $basket,
                'articles' => $articles,
                'totalCost' => $totalCost,
                'numProductsInBasket' => $numProductsInBasket,
            ]);
        });
    }
}
