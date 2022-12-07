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

        try {
            $this->getRequestValidation($request);
            
            $product = new Product();

            $product->fill($request->all());

            $store = $product->save();

            if ($store) {
                $response = $this->errorHandler(200, 'Product was added successfully.');
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

        try {
            if ($product) {
                $this->getRequestValidation($request);

                $product->fill($request->all());
                
                $update = $product->save();

                if ($update) {
                    $response = $this->errorHandler(200, 'Product was updated succesfully.');
                } else {
                    $response = $this->errorHandler(404, 'An error ocurred updating the product, please try again.');
                }
            } else {
                $response = $this->errorHandler(404, 'Product not found.');
            }
        } catch (Exception $e) {
            $response = $this->errorHandler(404, $e->getMessage());
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
     * Validator for the request data
     * 
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    private function getRequestValidation(Request $request)
    {
        return $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|integer',
            'sku'      => 'required',
            'price'    => 'required|numeric'
        ]);
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
