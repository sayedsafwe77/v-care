<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\DoctorAsks;


class DoctorAsksFactory extends Factory
{
    protected \$model = DoctorAsks::class;


    public function definition()
    {
        return [
            'doctor_id' => $this->faker->numberBetween(1, 100),
            'ask_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}