<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
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
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'category_id' => $this->faker->numberBetween(1, 2),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480,'cats'),
            'datetime' => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
