<?php


namespace App\Contracts;


interface ProductRepositoryContract {

    public function getActiveProducts();

    public function getProductsBySku(string $sku);

    public function getProductsById(int $id);

    public function getProductVariationsByProductId(int $productId);
}