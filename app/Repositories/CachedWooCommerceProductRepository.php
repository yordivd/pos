<?php


namespace App\Repositories;


use App\Contracts\ProductRepositoryContract;
use Illuminate\Cache\CacheManager;

class CachedWooCommerceProductRepository implements ProductRepositoryContract {

    private int $ttl = 30;

    public function __construct(
        private ProductRepositoryContract $productRepository,
        private CacheManager $cacheManager
    ){}

    public function getActiveProducts() {
        return $this->cacheManager->remember('products.active',$this->ttl, function(){
            return $this->productRepository->getActiveProducts();
        });
    }

    public function getProductsBySku($sku) {
        return $this->cacheManager->remember("products.sku:$sku",$this->ttl, function() use($sku){
            return $this->productRepository->getProductsBySku($sku);
        });
    }
}