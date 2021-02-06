<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size=[

                "size" => "s"
            // [
            //     "size" => "m"
            // ],
            // [
            //     "size" => "L"
            // ],
            // [
            //     "size" => "xl"
            // ],
            // [
            //     "size" => "2xl"
            // ],
            // [
            //     "size" => "3xl"
            // ],
            // [
            //     "size" => "4xl"
            // ],
        ];
        Size::create($size);
    }
}