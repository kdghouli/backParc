<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RepliesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ido' => $this->resource->id,
            'content' => $this->resource->content,
            'user_id' => $this->resource->user_id,
            'comment_id' => $this->resource->comment_id,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,

            // Include user information if needed
            'user' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->resource->user->id,
                    'name' => $this->resource->user->name,
                    'email' => $this->resource->user->email,
                    'image' => $this->resource->user->image,
                ];
            }, null),
        ];
    }
}
