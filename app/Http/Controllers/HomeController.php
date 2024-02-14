<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('s')) {
            $posts = Post::search($request->input('s'));
        } else {
            $posts = Post::limit(10)->with(['user','comments'])->orderby('id', 'desc')->get();
        }

        dd($posts->first());

        return view('home', ['title' => 'Home','posts' => $posts]);
    }
}
