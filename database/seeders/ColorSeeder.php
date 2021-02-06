<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color=[
                "color" =>"white"
            // [
            //     "color" => "black"
            // ],
            // [
            //     "color" => "violet"
            // ],
            // [
            //     "color" => "blue"
            // ],
            // [
            //     "color" => "indigo"
            // ],
            // [
            //     "color" => "green"
            // ],
            // [
            //     "color" => "yellow"
            // ],
            // [
            //     "orange" => "orange"
            // ],
            // [
            //     "color" => "red"
            // ],
        ];
        Color::create($color);
    }
}
