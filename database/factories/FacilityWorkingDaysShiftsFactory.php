<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\FacilityWorkingDaysShifts;


class FacilityWorkingDaysShiftsFactory extends Factory
{
    protected \$model = FacilityWorkingDaysShifts::class;


    public function definition()
    {
        return [
            'from' => $this->faker->time(),
            'to' => $this->faker->time(),
            'facility_day_shifts_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}