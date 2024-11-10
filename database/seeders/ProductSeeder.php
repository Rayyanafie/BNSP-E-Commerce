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
                'name' => 'Oximeter',
                'description' => 'Alat untuk mengukur kadar oksigen dalam darah.',
                'price' => 150000,
                'category_id' => 1, // Alat Diagnostik
                'image_path' => 'products/oximeter.jpg',
            ],
            [
                'name' => 'Thermometer',
                'description' => 'Alat untuk mengukur suhu tubuh.',
                'price' => 75000,
                'category_id' => 1, // Alat Diagnostik
                'image_path' => 'products/thermometer.jpg',
            ],
            [
                'name' => 'Stethoscope',
                'description' => 'Alat untuk mendengar detak jantung dan suara paru-paru.',
                'price' => 200000,
                'category_id' => 1, // Alat Diagnostik
                'image_path' => 'products/stetoskop.jpg',
            ],
            [
                'name' => 'Tongkat',
                'description' => 'Alat bantu berjalan untuk pasien.',
                'price' => 50000,
                'category_id' => 2, // Alat Bantu Mobilitas
                'image_path' => 'products/tongkat.jpg',
            ],
            [
                'name' => 'Kursi',
                'description' => 'Kursi untuk pasien yang membutuhkan tempat duduk khusus.',
                'price' => 150000,
                'category_id' => 2, // Alat Bantu Mobilitas
                'image_path' => 'products/kursi.jpg',
            ],
            [
                'name' => 'Senter',
                'description' => 'Senter untuk pemeriksaan kesehatan.',
                'price' => 30000,
                'category_id' => 3, // Aksesori Kesehatan
                'image_path' => 'products/senter.jpg',
            ],
            [
                'name' => 'Timbangan',
                'description' => 'Alat untuk mengukur berat badan.',
                'price' => 100000,
                'category_id' => 3, // Aksesori Kesehatan
                'image_path' => 'products/timbangan.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

