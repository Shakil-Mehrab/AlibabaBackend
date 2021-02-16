<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_tag')->insert([
            [
                'product_id' => Product::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
            ],
            [
                'product_id' => Product::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
            ],
            [
                'product_id' => Product::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
            ],
            [
                'product_id' => Product::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
            ],
            [
                'product_id' => Product::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
            ],
            [
                'product_id' => Product::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
            ],
            [
                'product_id' => Product::inRandomOrder()->first()->id,
                'tag_id' => Tag::inRandomOrder()->first()->id,
            ],
        ]);
    }
}