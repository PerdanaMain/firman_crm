<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        Role::insert([
            [
                'role_name' => 'Admin',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'role_name' => 'Manager',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'role_name' => 'Sales',
                "created_at" => now(),
                "updated_at" => now(),
            ],

        ]);
    }
}