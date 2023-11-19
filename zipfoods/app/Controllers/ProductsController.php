<?php
namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
        # Constructor class will intiailize the products object by loading up the JSON file
        $productsObj = new Products($this->app->path('database/products.json'));
        $products = $productsObj->getAll();

        return $this->app->view('products/index', [
            'products' => $products
        ]);
    }
}