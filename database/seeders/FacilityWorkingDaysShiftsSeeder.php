<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FacilityWorkingDaysShifts;


class FacilityWorkingDaysShiftsSeeder extends Seeder
{
    public function run(): void
    {
        FacilityWorkingDaysShifts::factory()->count(10)->create();
    }
}