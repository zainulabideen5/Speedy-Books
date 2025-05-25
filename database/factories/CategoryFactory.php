<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->name();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->text($maxNbChars = 500),
            'status' => fake()->randomElement(['ACTIVE', 'DEACTIVE']),
        ];
    }
}
