<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween($min = 0, $max = 5),
            'comment' => $this->faker->realText($this->faker->numberBetween(100, 200)),
        ];
    }
}
