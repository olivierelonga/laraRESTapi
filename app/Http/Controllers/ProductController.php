<?php

namespace App\Http\Controllers;
use App\Model\Product;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
    return Product::all();
    }

    public function edit(Product $product){
        return Product::all();
        }

    public function show(Product $product){
            // return $product;
            return new ProductResource($product);
        }

}
