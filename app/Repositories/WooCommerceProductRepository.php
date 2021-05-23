<?php


namespace App\Repositories;


use App\Contracts\ProductRepositoryContract;
use App\Contracts\WooCommerceApiContract;
use App\Entities\Product;

class WooCommerceProductRepository implements ProductRepositoryContract {

    public function __construct(private WooCommerceApiContract $api) {}

    public function getActiveProducts(){

        $products = $this->api->get('products',[
            'status' => 'publish',
            'stock_status' => 'instock'
        ]);

        return collect($products)->map(function($product){
            return Product::fromArray((array)$product);
        });

    }

    public function getProductsBySku($sku){

        $products = $this->api->get('products',[
            'status' => 'publish',
            'stock_status' => 'instock',
            'sku' => $sku
        ]);

        return collect($products)->map(function($product){
            return Product::fromArray((array)$product);
        });
    }
}