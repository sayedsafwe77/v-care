<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\FacilityWorkingDays;


class FacilityWorkingDaysFactory extends Factory
{
    protected \$model = FacilityWorkingDays::class;


    public function definition()
    {
        return [
            'day' => '0',
        ];
    }
}