<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Description for product 1',
                'price' => 100,
                'category_id' => 1,
                'image_path' => 'products/0z5lLX5XQeKMPZBER3YC1gv8zMo4ZTPcUEObwaK7.png',
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for product 2',
                'price' => 200,
                'category_id' => 1,
                'image_path' => 'products/0z5lLX5XQeKMPZBER3YC1gv8zMo4ZTPcUEObwaK7.png',
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description for product 3',
                'price' => 300,
                'category_id' => 2,
                'image_path' => 'products/0z5lLX5XQeKMPZBER3YC1gv8zMo4ZTPcUEObwaK7.png',
            ],
            [
                'name' => 'Product 4',
                'description' => 'Description for product 4',
                'price' => 400,
                'category_id' => 2,
                'image_path' => 'products/0z5lLX5XQeKMPZBER3YC1gv8zMo4ZTPcUEObwaK7.png',
            ],
            [
                'name' => 'Product 5',
                'description' => 'Description for product 5',
                'price' => 500,
                'category_id' => 1,
                'image_path' => 'products/0z5lLX5XQeKMPZBER3YC1gv8zMo4ZTPcUEObwaK7.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

