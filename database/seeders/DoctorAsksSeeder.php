<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DoctorAsks;


class DoctorAsksSeeder extends Seeder
{
    public function run(): void
    {
        DoctorAsks::factory()->count(10)->create();
    }
}