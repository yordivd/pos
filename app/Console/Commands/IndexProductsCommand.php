<?php

namespace App\Console\Commands;

use App\Repositories\WooCommerceProductRepository;
use Illuminate\Console\Command;
use Spatie\Fork\Fork;

class IndexProductsCommand extends Command
{

    protected $signature = 'index:products';

    protected $description = 'Index products';


    public function __construct(
        private WooCommerceProductRepository $productRepository
    )
    {
        parent::__construct();
    }

    public function handle()
    {



        $products = $this->productRepository->getActiveProducts();
        dd($products);
        foreach($products as $product){
            \Elasticsearch::index([
                'body' => json_decode(json_encode($product), true),
                'index' => 'products',
                'id' => $product->id,
            ]);
        }
    }
}
