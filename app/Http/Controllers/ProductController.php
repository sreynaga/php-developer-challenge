<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * List all products
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return response()->json(Product::all());
    }

    /**
     * Retrieve a specific product
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getProduct(Request $request)
    {
        return response()->json(Product::findOrFail($request->id));
    }   

    /**
     * Create a product
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->name     = $request->name;
        $product->category = $request->category;
        $product->sku      = $request->sku;
        $product->price    = $request->price;

        $product->save();
    }

    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $product->name     = $request->name;
        $product->category = $request->category;
        $product->sku      = $request->sku;
        $product->price    = $request->price;

        $product->save();

        return $product;
    }

    /**
     * Delete a product
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $product = Product::destroy($request->id);

        return $product;
    }
}
