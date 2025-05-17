<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FacilityWorkingDays;


class FacilityWorkingDaysSeeder extends Seeder
{
    public function run(): void
    {
        FacilityWorkingDays::factory()->count(10)->create();
    }
}