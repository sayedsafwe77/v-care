<?php

namespace Database\Factories;

use App\Faker\CityCountryProvider;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Zones;


class ZoneFactory extends Factory
{

    public function definition()
    {
        $city = City::inRandomOrder()->first();
        if (! $city) {
            return ['name' => 'ZoneName', 'city_id' => null];
        }

        $zones = CityCountryProvider::zones()[$city->name] ?? [
            ['name' => 'Unknown Zone', 'lat' => 0.0, 'lng' => 0.0]
        ];

        $zone = fake()->randomElement($zones);

        return [
            'name' => $zone['name'],
            'lat' => $zone['lat'],
            'lng' => $zone['lng'],
            'city_id' => $city->id,
        ];
    }
}