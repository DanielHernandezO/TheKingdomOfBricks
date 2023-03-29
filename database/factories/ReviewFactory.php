<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween($min = 0, $max = 5),
            'comment' => $this->faker->realText($this->faker->numberBetween(100, 200)),
            'item_id' => $this->faker->randomElement(Item::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
