<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Type::insert([
            [
                'type_name' => 'Calon Customer',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type_name' => 'Customer',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}