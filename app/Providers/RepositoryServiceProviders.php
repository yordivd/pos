<?php

namespace App\Providers;

use App\Apis\WooCommerceApi;
use App\Contracts\ProductRepositoryContract;
use App\Contracts\WooCommerceApiContract;
use App\Repositories\ElasticProductRepository;
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
            return new ElasticProductRepository();
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
