<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\DoctorServices;


class DoctorServicesFactory extends Factory
{
    protected \$model = DoctorServices::class;


    public function definition()
    {
        return [
            'doctor_id' => $this->faker->numberBetween(1, 100),
            'service_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}