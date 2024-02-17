<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::with('replies')->get();

        return CommentResource::collection($comments);
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment->load('replies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'postId' => 'required|exists:posts,id',
            'parentId' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create([
            'body' => $request->body,
            'post_id' => $request->postId,
            'parent_id' => $request->parentId,
        ]);

        return new CommentResource($comment->load('replies'));
    }

    public function update(Request $request,Comment $comment)
    {
        $request->validate([
            'like' => 'required|boolean',
        ]);

        $comment->update([
            'likes' => $request->like ? $comment->likes + 1 : $comment->likes - 1
        ]);

        $comment->refresh();

        return new CommentResource($comment->load('replies'));
    }
}
