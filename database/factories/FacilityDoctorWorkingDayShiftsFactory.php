<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\FacilityDoctorWorkingDayShifts;


class FacilityDoctorWorkingDayShiftsFactory extends Factory
{
    protected \$model = FacilityDoctorWorkingDayShifts::class;


    public function definition()
    {
        return [
            'from' => $this->faker->time(),
            'to' => $this->faker->time(),
            'shift_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}