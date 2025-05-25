<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Author::factory(50)->create();
        \App\Models\Category::factory(50)->create();
        \App\Models\Media::factory(50)->create();
        \App\Models\Team::factory(50)->create();
        \App\Models\Book::factory(50)->create();
        \App\Models\country::factory(100)->create();
        \App\Models\User::factory(10)->create();
    }
}
