<?php


namespace App\Repositories;


use App\Contracts\ProductRepositoryContract;
use App\Contracts\WooCommerceApiContract;
use App\Entities\Product;

class WooCommerceProductRepository implements ProductRepositoryContract {

    public function __construct(private WooCommerceApiContract $api) {}

    public function getActiveProducts(){

        $page = 1;
        $products = collect();

        while($page) {
            $productsFromApi = $this->api->get('products', [
                'status' => 'publish',
                'stock_status' => 'instock',
                'per_page' => 100,
                'page' => $page
            ]);

            if(empty($productsFromApi)){
                $page = false;
            }else{
                $products = $products->merge(collect($productsFromApi));
                $page++;
            }
        }

        return collect($products)->map(function($product){
            return Product::fromWooCommerceApi($product);
        });

    }

    public function getProductsBySku($sku){

        $products = $this->api->get('products',[
            'status' => 'publish',
            'stock_status' => 'instock',
            'sku' => $sku
        ]);

        return collect($products)->map(function($product){
            return Product::fromWooCommerceApi($product);
        });
    }

    public function getProductsById($id) {
        // TODO: Implement getProductsById() method.
    }

    public function getProductVariationsByProductId(int $productId) {
        // TODO: Implement getProductVariationsByProductId() method.
    }
}