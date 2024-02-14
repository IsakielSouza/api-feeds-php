<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store'])->name('login');
Route::get('/logout', [LoginController::class,'destroy'])->name('logout');

Route::get('/post/{id}', [PostController::class,'getById'])->name('post');
Route::get('/posts', [PostController::class,'getAll'])->name('posts');

Route::get('/comments/{post_id}', [CommentController::class,'getByPostId'])->name('comment');
/* Route::get('/comment/{comment}', [CommentController::class,'destroy'])->name('comment.destroy'); */
