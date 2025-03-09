<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @OA\Info(
 *      title="ECommerce API",
 *      version="1.0",
 *      description="API documentation for the ECommerce project",
 *      @OA\Contact(
 *          email="support@example.com"
 *      )
 * )
 */
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     summary="Get all products",
     *     @OA\Response(response=200, description="Success")
     * )
     */


    public function index()
    {
        $products = Cache::remember('products', 60, function () {
            return Product::all();
        });

        return response()->json($products);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
        ]);

        $product = Product::create($validated);

        // Clear product cache
        Cache::forget('products');

        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
            'category' => 'sometimes|required|string',
        ]);

        $product->update($validated);

        // Clear product cache
        Cache::forget('products');

        return response()->json($product);
    }



    public function show(Product $product)
    {
        return response()->json($product);
    }


    public function destroy(Product $product)
    {
        $product->delete();

        // Clear product cache
        Cache::forget('products');

        return response()->json(['message' => 'Product deleted successfully']);
    }

}
