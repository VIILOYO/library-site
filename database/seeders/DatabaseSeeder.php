<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\Post;
use App\Models\Style;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(100)->create();
        Style::factory(50)->create();
        Book::factory(2000)->create();
        Post::factory(100)->create();
    }
}
