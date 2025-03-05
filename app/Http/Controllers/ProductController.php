<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/jwt/products",
     *     summary="Get list of products",
     *     tags={"Products"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Response(response=200, description="List of products"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * @OA\Post(
     *     path="/api/jwt/products",
     *     summary="Create a new product",
     *     tags={"Products"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price"},
     *             @OA\Property(property="name", type="string", example="Laptop"),
     *             @OA\Property(property="description", type="string", example="Gaming Laptop"),
     *             @OA\Property(property="price", type="number", example=1200.99)
     *         ),
     *     ),
     *     @OA\Response(response=201, description="Product created successfully"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/jwt/products/{id}",
     *     summary="Get a single product",
     *     tags={"Products"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(response=200, description="Product data retrieved"),
     *     @OA\Response(response=404, description="Product not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    /**
     * @OA\Put(
     *     path="/api/jwt/products/{id}",
     *     summary="Update a product",
     *     tags={"Products"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price"},
     *             @OA\Property(property="name", type="string", example="Updated Laptop"),
     *             @OA\Property(property="description", type="string", example="High-end Gaming Laptop"),
     *             @OA\Property(property="price", type="number", example=1400.99)
     *         ),
     *     ),
     *     @OA\Response(response=200, description="Product updated successfully"),
     *     @OA\Response(response=404, description="Product not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->update($request->all());

        return response()->json($product);
    }

    /**
     * @OA\Delete(
     *     path="/api/jwt/products/{id}",
     *     summary="Delete a product",
     *     tags={"Products"},
     *     security={{ "bearerAuth":{} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(response=200, description="Product deleted successfully"),
     *     @OA\Response(response=404, description="Product not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
