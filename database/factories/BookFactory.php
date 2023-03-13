<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Style;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(3, true),
            'author_id' => Author::get()->random()->id,
            'style_id' => Style::get()->random()->id,
            'image' => $this->faker->imageUrl(640, 480, 'books', true),
            'year_of_release' => $this->faker->dateTime()->format('Y'),
            'is_available' => 1,
        ];
    }
}
