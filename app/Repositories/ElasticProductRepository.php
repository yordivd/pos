<?php


namespace App\Repositories;


use App\Contracts\ProductRepositoryContract;
use App\Entities\Product;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Illuminate\Cache\CacheManager;

class ElasticProductRepository implements ProductRepositoryContract {

    public function __construct() {
    }

    public function getActiveProducts() {
        $searchResult = \Elasticsearch::search([
            'index' => 'products',
            'body' => [
                'query' => [
                    'match' => [
                        'name' => "zilver"
                    ]
                ]
            ]
        ]);

        return collect($searchResult['hits']['hits'])->map(function ($product) {
            return Product::fromElasticSearch($product['_source']);
        });
    }

    public function getProductsBySku(string $sku) {
        try {
            $searchResult = \Elasticsearch::search([
                'index' => 'products',
                'body' => [
                    'query' => [
                        'match' => [
                            'sky' => $sku
                        ]
                    ]
                ]
            ]);

            return collect($searchResult['hits']['hits'])->map(function ($product) {
                return Product::fromElasticSearch($product['_source']);
            });

        } catch (Missing404Exception $e) {
            return collect();
        }
    }

    public function getProductsById(int $id) {
        try {
            $searchResult = \Elasticsearch::search([
                'index' => 'products',
                'body' => [
                    'query' => [
                        'match' => [
                            'id' => $id
                        ]
                    ]
                ]
            ]);

            return collect($searchResult['hits']['hits'])->map(function ($product) {
                return Product::fromElasticSearch($product['_source']);
            });

        } catch (Missing404Exception $e) {
            return collect();
        }
    }

    public function getProductVariationsByProductId(int $productId) {
        // TODO: Implement getProductVariationsByProductId() method.
    }
}