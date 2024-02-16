<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', UserController::class);
Route::apiResource('/posts', PostController::class);
Route::apiResource('/comments', CommentController::class);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
