<?php

namespace App\Providers;

use App\Repositories\CategorieRepositoryInterface;
use App\Repositories\CategorieRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind the CategorieRepositoryInterface to its concrete implementation CategorieRepository
        $this->app->bind(CategorieRepositoryInterface::class, CategorieRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function bootstrap()
    {
        //
    }
}
