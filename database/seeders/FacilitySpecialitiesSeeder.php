<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FacilitySpecialities;


class FacilitySpecialitiesSeeder extends Seeder
{
    public function run(): void
    {
        FacilitySpecialities::factory()->count(10)->create();
    }
}