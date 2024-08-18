<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::insert([
            [
                'customer_name' => 'John Doe',
                'customer_email' => 'john@mail.com',
                'customer_phone' => '08123456789',
                'customer_address' => '123 Main Street',
                'type_id' => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'customer_name' => 'Jane Doe',
                'customer_email' => 'jane@mail.com',
                'customer_phone' => '08123456788',
                'customer_address' => '123 Main Street',
                'type_id' => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'customer_name' => 'John Smith',
                'customer_email' => 'smith@mail.com',
                'customer_phone' => '08123456787',
                'customer_address' => '123 Main Street',
                'type_id' => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}