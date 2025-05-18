<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'phone_number' => fake()->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'bio' => fake()->optional()->paragraph(),
            'about' => fake()->optional()->paragraph(),
            'experience_years' => fake()->numberBetween(1, 30),
            'fees' => fake()->randomFloat(2, 100, 1000),
            'rate' => fake()->randomFloat(1, 1, 5),
            'waiting_time' => fake()->numberBetween(5, 60),
            'status' => fake()->boolean(90),
        ];
    }
}
