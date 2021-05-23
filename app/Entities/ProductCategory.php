<?php


namespace App\Entities;


class ProductCategory {


    public function __construct(
        public int $id,
        public string $name,
        public string $slug
    ) {}

    public static function fromArray(array $data) : ProductCategory{

        return new self(...[
            'id' => $data['id'],
            'name' => $data['name'],
            'slug' => $data['slug']
        ]);

    }
}