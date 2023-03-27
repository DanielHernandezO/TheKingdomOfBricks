<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    public function definition(): array
    {   
        return [
            'name' => fake()->name(),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
        ];
    }
}
