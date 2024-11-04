<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Tambahkan use untuk Str::slug()

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
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(rand(1, 2), false), // Perbaikan fake()->sentence()
            'slug' => Str::slug(fake()->sentence(rand(1, 2), false)) // Tambahkan koma yang hilang
        ];
    }
}