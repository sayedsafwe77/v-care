<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Services;


class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        Services::factory()->count(10)->create();
    }
}