<?php

namespace Database\Seeders;

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
    }
}
