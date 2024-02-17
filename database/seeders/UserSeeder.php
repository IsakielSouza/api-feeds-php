<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();

        foreach($users as $user) {
            $post = Post::factory()->create([
                'author_id' => $user->id
            ]);

            Comment::factory()->for($post)->create();
        }
    }

}
