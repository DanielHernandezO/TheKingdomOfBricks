<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText($this->faker->numberBetween($min = 10, $max = 18)),
            'type' => $this->faker->randomElement(['Head', 'Chest', 'Legs', 'Box']),
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
            'guide' => $this->faker->paragraph,
            'pieces' => $this->faker->numberBetween($min = 1, $max = 1000),
            'stock' => $this->faker->numberBetween($min = 0, $max = 50),
        ];
    }
}
