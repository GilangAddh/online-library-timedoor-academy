<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => $this->faker->isbn13,
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name,
            'image_path' => $this->faker->imageUrl(),
            'publisher' => $this->faker->company,
            'category' => $this->faker->word,
            'pages' => $this->faker->numberBetween(100, 1000),
            'language' => $this->faker->locale,
            'publish_date' => $this->faker->dateTimeBetween('2000-03-26 10:11:08', '2024-03-26 10:11:08'),
            'subjects' => $this->faker->words(3, true),
            'desc' => $this->faker->paragraph(20),
        ];
    }
}
