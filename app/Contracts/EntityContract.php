<?php


namespace App\Contracts;

interface EntityContract {

    public static function fromArray(array $data) : EntityContract;
}