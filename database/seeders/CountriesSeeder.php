<?php

namespace Database\Seeders;

use App\Faker\CityCountryProvider;
use Illuminate\Database\Seeder;

use App\Models\Countries;
use App\Models\Country;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        foreach (CityCountryProvider::countries() as $country) {
            Country::create(['name' => $country]);
        }
    }
}