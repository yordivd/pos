<?php

namespace App\Http\Controllers;

use App\Contracts\ProductRepositoryContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StoreController extends Controller
{
    public function index(Request $request, ProductRepositoryContract $productRepository){

        if($request->get('filter')){
            $filter = $request->get('filter');
            $products = $productRepository->getProductsBySku($filter['value']);
        }else {
            $products = $productRepository->getActiveProducts();
        }

        return Inertia::render('Store/Index', [
            'products' => $products,
            'cart' => [
                'products' => $products
            ]
        ]);
    }
}
