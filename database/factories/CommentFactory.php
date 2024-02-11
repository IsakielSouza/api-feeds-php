<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::pluck('id')->random(),
            'user_origin_id' => User::pluck('id')->random(),
            'user_target_id' => User::pluck('id')->random(),
            'comment' => $this->faker->paragraph(2),
            'total_likes' => $this->faker->randomNumber(),
        ];
    }
}
