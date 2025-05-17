<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Appointments;


class AppointmentsFactory extends Factory
{
    protected \$model = Appointments::class;


    public function definition()
    {
        return [
            'patient_id' => $this->faker->numberBetween(1, 100),
            'doctor_id' => $this->faker->numberBetween(1, 100),
            'shift_id' => $this->faker->numberBetween(1, 100),
            'slot_index' => $this->faker->numberBetween(1, 100),
            'date' => $this->faker->dateTime(),
        ];
    }
}