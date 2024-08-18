<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                "password" => Hash::make('admin'),
                'role_id' => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'name' => 'Manager',
                'username' => 'manager',
                "password" => Hash::make('manager'),
                'role_id' => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'name' => 'Sales',
                'username' => 'sales',
                "password" => Hash::make('sales'),
                'role_id' => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}