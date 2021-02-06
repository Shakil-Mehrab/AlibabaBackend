<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Bag\Articles\ArticleStatus;
use App\Bag\Product\ProductStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::all()->random()->id;
            },
            'status' => ProductStatus::PENDING,
            'name' => $name = $this->faker->sentence,
            'slug' => Str::slug($name),
            'thumbnail' => $this->faker->imageUrl(640,480),
            'price' => $this->faker->numberBetween(1000,9000),
            'description' => $this->faker->paragraph,
            'short_description' => $this->faker->sentence,
        ];
    }
}