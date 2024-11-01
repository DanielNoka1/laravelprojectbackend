<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Path to the JSON file
        $jsonFile = database_path('seeders/products.json');
        
        // Check if the file exists
        if (File::exists($jsonFile)) {
            // Get the content of the file
            $json = File::get($jsonFile);
            
            // Decode the JSON data
            $products = json_decode($json, true);

            foreach ($products as $product) {
                Product::create([
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
                ]);
            }
        } else {
            echo "JSON file not found.";
        }
    }
}

