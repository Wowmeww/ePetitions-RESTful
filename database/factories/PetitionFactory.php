<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petition>
 */
class PetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'category' => fake()->text(50),
            'description' => fake()->text(200),
            'author' => fake()->name(),
            'signees' => fake()->numberBetween(0, 1000000),
        ];
    }
}
