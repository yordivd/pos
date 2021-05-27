<?php


namespace App\Entities;


use App\Contracts\EntityContract;

class ProductCategory implements EntityContract{


    public function __construct(
        public int $id,
        public string $name,
        public string $slug
    ) {}

    public static function fromWooCommerceApi(object $data) : ProductCategory{

        return new self(...[
            'id' => $data->id,
            'name' => $data->name,
            'slug' => $data->slug
        ]);

    }

    public static function fromElasticSearch(array $data): EntityContract {
        // TODO: Implement fromElasticSearch() method.
    }
}