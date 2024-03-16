<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostApiResource extends JsonResource
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
            'image' => $this->cover_image,
            'title' => $this->title,
            'summary' => $this->summary,
            'body' => $this->body,
            'slug' => $this->slug,
            'author' => $this->author?->name ?? 'No Author',
            'create_at' => $this->created_at->format('d M, Y')
        ];
    }
}
