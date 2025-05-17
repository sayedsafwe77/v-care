<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Reviews;


class ReviewsFactory extends Factory
{
    protected \$model = Reviews::class;


    public function definition()
    {
        return [
            'clinic_rate' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}