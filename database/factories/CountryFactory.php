<?php

namespace Database\Factories;

use App\Faker\CityCountryProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorTitle>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = CityCountryProvider::countries();
        return [
            'name' => fake()->unique()->randomElement($countries),
        ];
    }
}