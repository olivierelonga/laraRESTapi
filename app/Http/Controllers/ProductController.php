<?php

namespace App\Http\Controllers;
use App\Model\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){

    // return Product::all();
    return ProductCollection::collection(Product::paginate(20));

    }

    public function edit(Product $product){
        return Product::all();
        }

    public function show(Product $product){
            // return $product;
            return new ProductResource($product);
        }

}
