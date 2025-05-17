<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DoctorServices;


class DoctorServicesSeeder extends Seeder
{
    public function run(): void
    {
        DoctorServices::factory()->count(10)->create();
    }
}