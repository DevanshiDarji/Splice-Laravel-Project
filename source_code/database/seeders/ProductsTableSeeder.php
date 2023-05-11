<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'description' => 'This is the first product',
                'price' => 9.99,
                'image' => 'product1.jpg',
                'quantity' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 2',
                'description' => 'This is the second product',
                'price' => 19.99,
                'image' => 'product2.jpg',
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 3',
                'description' => 'This is the third product',
                'price' => 29.99,
                'image' => 'product3.jpg',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}






