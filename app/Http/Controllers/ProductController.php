<?php

namespace App\Http\Controllers;
use App\Model\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Request\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }
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


        public function store(ProductRequest $request){

            // return $productRequest::all();
            $product = new Product;
            $product->name = $request->name;
            $product->name = $request->description;
            $product->name = $request->stock;
            $product->name = $request->price;
            $product->name = $request->discount;
            $product->save();

            return response([
                'data' => new ProductRequest($request)
            ],201);
        }

        public function update(Request $request, Product $product){
            $request['detail'] = $request->description;
            unset($request['description']);
            $product->update($request->all());
            // add reponse Response.php
        }


        public function destroy(){
            $product->delete();
            // add reponse
        }

}
