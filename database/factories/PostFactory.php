<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 3),
            'category_id' => rand(1, 10),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'excerpt' => collect($this->faker->paragraphs(2))->map(fn ($item) => "<p>{$item}</p>")->implode(''),
            'body' => collect($this->faker->paragraphs(6))->map(fn ($item) => "<p>{$item}</p>")->implode(''),
        ];
    }
}
