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
        $totalComments = Comment::where('post_id', $this->id)->count();

        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'slug' => $this->slug,
            'image' => $this->image,
            'totalLikes' => $this->total_likes,
            'totalComments' => $totalComments,
            'createdAt' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
