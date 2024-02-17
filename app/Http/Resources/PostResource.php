<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'authorId' => $this->author_id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'likes' => $this->likes,
            'totalComments' => $this->comments->count(),
            'createdAt' => Carbon::make($this->created_at)->format('Y-m-d'),
            'comments'  => CommentResource::collection($this->comments)
        ];
    }
}
