<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_origin_id');
    }

    public static function search($search)
    {
        return self::where('title', "like", "%{$search}%")
        ->orWhere('description', "like", "%{$search}%")
        ->with(['user','comments'])
        ->paginate(3);
    }
}
