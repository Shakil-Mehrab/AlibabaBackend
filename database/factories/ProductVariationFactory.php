<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductVariation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => function () {
                return Product::all()->random()->id;
            },
            // 'product_variation_type_id' => function () {
            //     return ProductVariationType::all()->random()->id;
            // },
            'thumbnail' => $this->faker->imageUrl(640,480),
            'price' => $this->faker->numberBetween(1000,9000),
        ];
    }
}