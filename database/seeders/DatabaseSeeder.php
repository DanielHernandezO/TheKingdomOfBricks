<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Item::factory(10)->create();
        Review::factory(10)->create();
    }
}
