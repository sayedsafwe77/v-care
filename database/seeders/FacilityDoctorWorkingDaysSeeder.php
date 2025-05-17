<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FacilityDoctorWorkingDays;


class FacilityDoctorWorkingDaysSeeder extends Seeder
{
    public function run(): void
    {
        FacilityDoctorWorkingDays::factory()->count(10)->create();
    }
}