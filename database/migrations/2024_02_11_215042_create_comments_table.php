<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('user_origin_id');
            $table->foreign('user_origin_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_target_id')->nullable();
            $table->foreign('user_target_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('comment');
            $table->integer('total_likes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
