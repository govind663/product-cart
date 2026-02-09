<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'iPhone 15',
                'description' => 'Latest Apple iPhone with A17 chip',
                'price' => 79999,
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'description' => 'Flagship Android phone with AI features',
                'price' => 69999
            ],
            [
                'name' => 'OnePlus 12',
                'description' => 'Fast and smooth performance with Snapdragon processor',
                'price' => 64999
            ],
            [
                'name' => 'Google Pixel 8',
                'description' => 'Pure Android experience with best camera',
                'price' => 62999
            ],
            [
                'name' => 'Xiaomi 14 Pro',
                'description' => 'High-end specs at competitive pricing',
                'price' => 58999
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
