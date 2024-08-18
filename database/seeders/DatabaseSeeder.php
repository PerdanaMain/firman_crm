<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            StatusSeeder::class,
            TypeSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
        ]);
    }
}