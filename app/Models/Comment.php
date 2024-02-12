<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_origin_id',
        'user_target_id',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_origin_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function commentTarget()
    {
        return $this->belongsTo(Post::class, 'user_target_id');
    }
}
