<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index()
    {
        $comment = Comment::all();

        return CommentResource::collection($comment);
    }

    public function show(string $id)
    {
        $user = Comment::findOrFail($id);

        return new CommentResource($user);
    }
}
