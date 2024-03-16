<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsAPiResource extends JsonResource
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
            'title' => $this->title,
            'image' => $this->cover_image,
            'slug' => $this->slug,
            'author' => $this->author?->name ?? 'No Author',
            'create_at' => $this->created_at->format('d M, Y')
        ];
    }
}
