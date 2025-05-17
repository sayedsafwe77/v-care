<?php

namespace Database\Factories;

use App\Faker\CityCountryProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Cities;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{


    public function definition()
    {
        $country = Country::inRandomOrder()->first() ?? Country::factory()->create();

        $cityList = CityCountryProvider::cities()[$country->name] ?? ['Unknown City'];
        
        return [
            'name' => fake()->unique()->randomElement($cityList),
            'country_id' => $country->id,
        ];
    }
}