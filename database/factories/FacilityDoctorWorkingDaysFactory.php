<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\FacilityDoctorWorkingDays;


class FacilityDoctorWorkingDaysFactory extends Factory
{
    protected \$model = FacilityDoctorWorkingDays::class;


    public function definition()
    {
        return [
            'day' => '0',
        ];
    }
}