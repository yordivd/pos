<?php

namespace App\Providers;

use App\Apis\WooCommerceApi;
use App\Contracts\WooCommerceApiContract;
use Illuminate\Support\ServiceProvider;

class WooCommerceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WooCommerceApiContract::class, function($app){
            return new WooCommerceApi(
                config('services.woocommerce.endpoint'),
                config('services.woocommerce.key'),
                config('services.woocommerce.secret'),
                [
                    'version' => 'wc/v3',
                ]
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

    }
}
