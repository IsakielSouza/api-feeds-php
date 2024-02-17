<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'title' => fake()->title(),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->company(),
        ];
    }
}
