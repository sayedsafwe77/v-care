<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DoctorTitles;


class DoctorTitlesSeeder extends Seeder
{
    public function run(): void
    {
        DoctorTitles::factory()->count(10)->create();
    }
}