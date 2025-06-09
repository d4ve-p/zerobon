<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Challenge>
 */
class ChallengeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name,
            "description" => fake()->text(),
            "point_reward" => fake()->numberBetween(10, 50),
            "start_date" => fake()->dateTimeBetween("now", "+5days"),
            "end_date" => fake()->dateTimeBetween("+10days", "+30days")
        ];
    }
}
