<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Facilities;


class FacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        Facilities::factory()->count(10)->create();
    }
}