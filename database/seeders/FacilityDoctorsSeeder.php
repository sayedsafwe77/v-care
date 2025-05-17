<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FacilityDoctors;


class FacilityDoctorsSeeder extends Seeder
{
    public function run(): void
    {
        FacilityDoctors::factory()->count(10)->create();
    }
}