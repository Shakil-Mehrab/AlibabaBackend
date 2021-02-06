<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

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
            'name' => $name = $this->faker->unique()->word,
            'slug' => Str::slug($name),
            'live' => true,
        ];
    }
}
