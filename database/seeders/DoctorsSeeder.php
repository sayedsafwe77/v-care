<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Doctors;


class DoctorsSeeder extends Seeder
{
    public function run(): void
    {
        Doctors::factory()->count(10)->create();
    }
}