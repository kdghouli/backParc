<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'description' => $this->description,
            'priority' => $this->priority,
            'status' => $this->status,
            'urgence' => $this->urgence,
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),

            // Informations supplémentaires optionnelles
            'metadata' => [
                'priority_color' => $this->priority_color,
                'status_color' => $this->status_color,
                'urgence_color' => $this->urgence_color,
                'is_overdue' => $this->isOverdue(),
                'formatted_created_at' => $this->formatted_created_at,
                'formatted_updated_at' => $this->formatted_updated_at,
            ],
        ];
    }

    /**
     * Customize the response for a request.
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(200);
    }
}
