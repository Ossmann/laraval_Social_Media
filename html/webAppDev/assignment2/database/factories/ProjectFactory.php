<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Text;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(12),
            'description' => Text::random(40),
            'students_required' => random_int(1, 10),
            'year' => $this->faker->randomElement([2022, 2023, 2024]), // Assuming you want to pick from these years
            'trimester' => $this->faker->randomElement(['T1', 'T2', 'T3']), // Assuming trimester is a string
        ];
    }
}