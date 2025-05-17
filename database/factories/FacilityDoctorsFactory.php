<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\FacilityDoctors;


class FacilityDoctorsFactory extends Factory
{
    protected \$model = FacilityDoctors::class;


    public function definition()
    {
        return [
            'doctor_id' => $this->faker->numberBetween(1, 100),
            'facility_id' => $this->faker->numberBetween(1, 100),
            'visit_duration' => $this->faker->numberBetween(1, 100),
        ];
    }
}