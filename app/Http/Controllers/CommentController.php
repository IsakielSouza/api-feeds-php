<?php

namespace App\Http\Controllers;

use App\Events\CommentPost;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function getByPostId($postId) {

        $comment = Comment::where('post_id', $postId)->get();

        return $comment;
    }
}
