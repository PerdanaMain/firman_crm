<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        Status::insert([
            [
                'status_name' => 'Pending',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'status_name' => 'Approved',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'status_name' => 'Rejected',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}