<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        $avatar =  $this->faker->image('public/images/users', 640, 480);
        return [
            'name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'avatar' => str_replace('public', '', $avatar),
            'password' => bcrypt('123456'),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn () => [
            'email_verified_at' => null,
        ]);
    }
}
