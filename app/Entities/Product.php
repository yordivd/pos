<?php


namespace App\Entities;


use App\Contracts\EntityContract;

class Product implements EntityContract {

    public function __construct(
        public int $id,
        public string $name,
        public string $type,
        public float $price,
        public ProductCategory $category,
    ) {}


    public static function fromWooCommerceApi(object $data) : Product{
        return new self(...[
            'id' => $data->id,
            'name' => $data->name,
            'type' => $data->type,
            'price' => (float) $data->price,
            'category' => ProductCategory::fromWooCommerceApi($data->categories[0])
        ]);
    }

    public static function fromElasticSearch(array $data) : Product{
        return new self(...[
            'id' => $data['id'],
            'name' => $data['name'],
            'type' => $data['type'],
            'price' => (float) $data['price'],
            'category' => ProductCategory::fromElasticSearch($data['category'])
        ]);
    }

}