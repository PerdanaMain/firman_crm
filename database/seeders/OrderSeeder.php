<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::insert([
            [
                "customer_id" => 1,
                "status_id" => 1,
                "product_id" => rand(1, 5),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "customer_id" => 3,
                "status_id" => 1,
                "product_id" => rand(1, 5),
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);

    }
}