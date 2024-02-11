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
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title =  $this->faker->sentence(4);
        $image =  $this->faker->image('public/images/posts', 640, 480);
        return [
            'title' => $title,
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->text(),
            'slug' => Str::slug($title),
            'image' => str_replace('public', '', $image),
            'total_likes' => $this->faker->randomNumber(),
            'author_id' => User::pluck('id')->random(),
        ];
    }
}
