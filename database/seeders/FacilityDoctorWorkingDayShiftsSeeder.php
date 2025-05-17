<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FacilityDoctorWorkingDayShifts;


class FacilityDoctorWorkingDayShiftsSeeder extends Seeder
{
    public function run(): void
    {
        FacilityDoctorWorkingDayShifts::factory()->count(10)->create();
    }
}