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


    public static function fromArray(array $data) : Product{
        return new self(...[
            'id' => $data['id'],
            'name' => $data['name'],
            'type' => $data['type'],
            'price' => $data['price'],
            'category' => ProductCategory::fromArray((array)$data['categories'][0])
        ]);
    }

}