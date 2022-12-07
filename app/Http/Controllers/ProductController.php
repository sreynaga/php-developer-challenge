<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    /**
     * List all products
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request): JsonResponse
    {
        return response()->json(Product::all());
    }

    /**
     * Retrieve a specific product
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduct(Request $request)
    {
        return response()->json(Product::findOrFail($request->id));
    }   

    /**
     * Create a product
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $response = [];

        $product = new Product();

        $product->name     = $request->name;
        $product->category = $request->category;
        $product->sku      = $request->sku;
        $product->price    = $request->price;

        try {
            $store = $product->save();

            if ($store) {
                $response = $this->errorHandler(200, 'Product was added succesfully.');
            } else {
                $response = $this->errorHandler(404, 'An error ocurred adding the product, please try again.');
            }
        } catch (Exception $e) {
            $response = $this->errorHandler(404, $e->getMessage());
        }

        return response()->json($response);
    }

    /**
     * Update a product
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $response = [];

        $product = Product::find($request->id);

        if ($product) {
            $product->name     = $request->name;
            $product->category = $request->category;
            $product->sku      = $request->sku;
            $product->price    = $request->price;

            try {
                $update = $product->save();

                if ($update) {
                    $response = $this->errorHandler(200, 'Product was updated succesfully.');
                } else {
                    $response = $this->errorHandler(404, 'An error ocurred updating the product, please try again.');
                }
            } catch (Exception $e) {
                $response = $this->errorHandler(404, $e->getMessage());
            }
        } else {
            $response = $this->errorHandler(404, 'Product not found.');
        }     

        return response()->json($response);
    }

    /**
     * Delete a product
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        $response = [];

        $product = Product::find($request->id);

        try {
            if ($product->id) {
                Product::destroy($request->id);

                $response = $this->errorHandler(200, 'Product was deleted.');
            } else {
                $response = $this->errorHandler(404, 'Product not found.');
            }
        } catch (Exception $e) {
            $response = $this->errorHandler(404, $e->getMessage());
        }

        return response()->json($response);
    }

    /**
     * Error Handler
     * 
     * @param int $statusCode
     * @param string $message
     * @return array
     */
    private function errorHandler(int $statusCode, string $message): array
    {
        return [
            'status'  => $statusCode,
            'message' => $message,
        ];
    }
}
