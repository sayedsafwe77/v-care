<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\FacilitySpecialities;


class FacilitySpecialitiesFactory extends Factory
{
    protected \$model = FacilitySpecialities::class;


    public function definition()
    {
        return [
            'speciality_id' => $this->faker->numberBetween(1, 100),
            'facility_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}