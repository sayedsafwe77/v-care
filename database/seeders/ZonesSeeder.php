<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;



class ZonesSeeder extends Seeder
{
    public function run(): void
    {
        Zone::factory()->count(10)->create();
    }
}