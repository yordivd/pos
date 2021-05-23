<?php

namespace App\Providers;

use App\Apis\WooCommerceApi;
use App\Contracts\ProductRepositoryContract;
use App\Contracts\WooCommerceApiContract;
use App\Repositories\CachedWooCommerceProductRepository;
use App\Repositories\WooCommerceProductRepository;
use Illuminate\Cache\CacheManager;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProductRepositoryContract::class, function($app){
            return new CachedWooCommerceProductRepository(
                new WooCommerceProductRepository($app->make(WooCommerceApiContract::class)),
                $app->make(CacheManager::class)
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
