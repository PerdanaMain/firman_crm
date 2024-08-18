<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        Product::insert([
            [
                "product_name" => "Product ISP 1",
                "product_price" => 100000,
                "product_stock" => 10,
                "product_description" => "Product ISP 1 Description",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "product_name" => "Product ISP 2",
                "product_price" => 200000,
                "product_stock" => 20,
                "product_description" => "Product ISP 2 Description",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "product_name" => "Product ISP 3",
                "product_price" => 300000,
                "product_stock" => 30,
                "product_description" => "Product ISP 3 Description",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "product_name" => "Product ISP 4",
                "product_price" => 400000,
                "product_stock" => 40,
                "product_description" => "Product ISP 4 Description",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "product_name" => "Product ISP 5",
                "product_price" => 500000,
                "product_stock" => 50,
                "product_description" => "Product ISP 5 Description",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}