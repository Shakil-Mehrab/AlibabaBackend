<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(50)->create();
        \App\Models\ProductVariationType::factory(2)->create();
        \App\Models\ProductVariation::factory(20)->create();
    }
}