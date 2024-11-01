<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function upload(Request $request)
    {
        $data = $request->json()->all(); // Get JSON data

        // Validate and prepare the products for bulk insert
        $productsToInsert = [];
        foreach ($data as $product) {
            $productsToInsert[] = [
                'sku' => $product['sku'],
                'title' => $product['title'],
                'description' => $product['description'],
                'size' => $product['size'],
                'stock_status' => $product['stock_status'],
                'price_min' => $product['price']['min'],
                'price_max' => $product['price']['max'],
                'regular_price' => $product['price']['regular_price'],
                'sale_price' => $product['price']['sale_price'],
                'stock_qty' => $product['stock_qty'],
                'image_src' => $product['image']['src'] ?? null,
                'image_alt' => $product['image']['alt'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert products into the database
        Product::insert($productsToInsert);

        return response()->json(['message' => 'Products uploaded successfully!'], 201);
    }

    public function index() // Add this method
    {
        $products = Product::all(); // Fetch all products
        return view('products.index', compact('products')); // Return the view with products
    }
}
