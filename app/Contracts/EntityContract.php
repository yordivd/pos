<?php


namespace App\Contracts;

interface EntityContract {

    public static function fromWooCommerceApi(object $data) : EntityContract;

    public static function fromElasticSearch(array $data) : EntityContract;
}