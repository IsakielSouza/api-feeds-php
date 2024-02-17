<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\LikePostController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/posts', PostController::class);
    Route::apiResource('/comments', CommentController::class);
});

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout');
});
