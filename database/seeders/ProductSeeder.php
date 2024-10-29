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
        // Buat 5 data produk
        Product::create([
            'name' => 'Tensimeter Digital',
            'description' => 'Alat untuk mengukur tekanan darah',
            'price' => 150000,
            'category_id' => 1,
            'image_path' => 'path/to/image1.jpg'
        ]);

        Product::create([
            'name' => 'Thermometer Digital',
            'description' => 'Alat untuk mengukur suhu tubuh',
            'price' => 50000,
            'category_id' => 1,
            'image_path' => 'path/to/image2.jpg'
        ]);

        Product::create([
            'name' => 'Kursi Roda',
            'description' => 'Kursi roda standar untuk kebutuhan medis',
            'price' => 1300000,
            'category_id' => 2,
            'image_path' => 'path/to/image3.jpg'
        ]);

        Product::create([
            'name' => 'Stetoskop',
            'description' => 'Alat untuk mendengarkan suara tubuh',
            'price' => 75000,
            'category_id' => 1,
            'image_path' => 'path/to/image5.jpg'
        ]);
    }
}
