<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
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
            'designation' => fake()->jobTitle(),
            'dob' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'country' => fake()->country(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'description' => fake()->text($maxNbChars = 500),
            'author_feature' => fake()->randomElement(['yes', 'no']),
            'facebook_id' => fake()->safeEmail(),
            'twitter_id' => fake()->safeEmail(),
            'youtube_id' => fake()->safeEmail(),
            'pinterest_id' => fake()->safeEmail(),
            'author_img' => 'No image found',
            'status' => fake()->randomElement(['ACTIVE', 'DEACTIVE']),
        ];
    }
}
