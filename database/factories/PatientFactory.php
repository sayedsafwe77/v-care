<?php

namespace Database\Factories;

use App\Faker\CityCountryProvider;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = City::inRandomOrder()->first() ?? City::factory()->create();

        $cities = CityCountryProvider::zones();
        $city_data = collect($cities)->filter(fn($c,$key) => $key == $city->name);

        dd($city_data,$city->toArray());
        // $names = CityCountryProvider::zones()[$zone->name] ?? [
        //     ['first_name' => $this->faker->firstName, 'last_name' => $this->faker->lastName]
        // ];

        // $name = $this->faker->randomElement($names);

        // return [
        //     'first_name' => $name['first_name'],
        //     'last_name' => $name['last_name'],
        //     'zone_id' => $zone->id,
        // ];
    }
}
