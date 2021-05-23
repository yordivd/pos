<?php


namespace App\Contracts;


interface ProductRepositoryContract {

    public function getActiveProducts();

    public function getProductsBySku($sku);
}