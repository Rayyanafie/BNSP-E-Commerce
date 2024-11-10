<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Buat 2 data user
        User::create([
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('123123123'),
            'birth_date' => '1990-01-01',
            'gender' => 'male',
            'address' => '123 Main St',
            'city' => 'City1',
            'phone' => '1234567890',
            'paypal_id' => 'user1_paypal'
        ]);

        User::create([
            'username' => 'user2',
            'email' => 'raegaxus12@gmail.com',
            'password' => Hash::make('123123123'),
            'birth_date' => '1992-02-02',
            'gender' => 'female',
            'address' => '456 Main St',
            'city' => 'City2',
            'phone' => '0987654321',
            'paypal_id' => 'user2_paypal'
        ]);
    }
}

