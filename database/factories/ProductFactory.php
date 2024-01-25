<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'main_image' => fake()->imageUrl(),
            'product_images' => json_encode([fake()->imageUrl(), fake()->imageUrl()]),
            'product_details' => fake()->text(),
            'category_id' => function () {
                return Category::inRandomOrder()->first()->id;
            },
        ];
    }
}
