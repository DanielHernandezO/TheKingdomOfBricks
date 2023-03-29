<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Item;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Item::factory(30)->create();
        User::factory(30)->create();
        Review::factory(30)->create();
        Character::factory(5)->create();
        $this->attachCharacters();
    }

    public function attachCharacters(): void
    {
        $characters = Character::all();
        $items = Item::all();

        foreach ($characters as $character) {
            $headItem = $items->where('type', 'head')->random();
            $chestItem = $items->where('type', 'chest')->random();
            $legItem = $items->where('type', 'legs')->random();

            $character->items()->attach($headItem, ['type' => 'head']);
            $character->items()->attach($chestItem, ['type' => 'chest']);
            $character->items()->attach($legItem, ['type' => 'legs']);
        }
    }
}
