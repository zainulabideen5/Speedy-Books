<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->name;
        return [
            'category_id' => fake()->numberBetween($min = 1, $max = 50),
            'author_id' => fake()->numberBetween($min = 1, $max = 50),
            'title' => $title,
            'slug' => Str::slug($title),
            'availability' => fake()->randomElement(['Stock', 'out of Stock']),
            'price' => fake()->numberBetween($min = 1000, $max = 10000),
            'rating' => 'rating',
            'publisher' => fake()->company,
            'country_of_publisher' => fake()->country,
            'isbn' => fake()->isbn13,
            'isbn-10' => fake()->isbn10,
            'audience' => fake()->randomElement(['General','Audult', 'Kids']),
            'format' => fake()->randomElement(['ePUB','eBook', 'PDF', 'DOC']),
            'language' => fake()->languageCode,
            'description' => fake()->text($maxNbChars = 500),
            'total_pages' => fake()->numberBetween($min = 100, $max = 1000),
            'downloaded' => fake()->numberBetween($min = 1, $max = 1000),
            'edition_number' => fake()->randomElement(['1st Edition','2nd Edition', '3rd Edition']),
            'recommended' => fake()->boolean,
            'book_upload' => 'No pdf found',
            'book_img' => 'No image found',
            'status' => fake()->randomElement(['DEACTIVE','ACTIVE', 'UPCOMING']),
        ];
    }
}
