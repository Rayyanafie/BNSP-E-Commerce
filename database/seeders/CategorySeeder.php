<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat 2 data kategori
        Category::create([
            'name' => 'Kesehatan'
        ]);

        Category::create([
            'name' => 'Peralatan Medis'
        ]);
    }
}

