<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAll()
    {
        $posts = Post::withCount('comments')->get();

        return $posts;
    }

    public function getById($id)
    {
        $post = Post::withCount('comments')->findOrFail($id);

        return $post;
    }
}
