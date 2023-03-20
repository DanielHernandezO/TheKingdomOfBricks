<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText($this->faker->numberBetween($min = 10, $max = 18)),
            'type' => $this->faker->randomElement(['head', 'chest', 'legs', 'box']),
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
            'guide' => $this->faker->paragraph,
            'pieces' => $this->faker->numberBetween($min = 1, $max = 1000),
            'stock' => $this->faker->numberBetween($min = 0, $max = 50),
            'image' => $this->faker->image('public/storage/item',640,480, null, false),
        ];
    }
}
