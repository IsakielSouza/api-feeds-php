<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        $post->load('comments');

        return new PostResource($post);
    }

    public function store(Request $request)
    {
        $request->validate([
            'authorId' => 'required|exists:users,id',
            'description' => 'required',
            'type' => 'nullable',
            'title' => 'string',
        ]);


        $post =  (new Post)->fill([
            'author_id' => $request->authorId,
            'description' => $request->description,
            'type' => $request->type,
            'title' => $request->title
        ]);

        $post->save();

        return new PostResource($post);
    }
}
