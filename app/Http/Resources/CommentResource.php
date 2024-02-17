<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'postId' => $this->post_id,
            'parentId' => $this->parent_id,
            'likes' => $this->likes,
            'replies' => CommentResource::collection($this->replies),
        ];
    }
}
