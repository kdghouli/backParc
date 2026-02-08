<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImagesVhlRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            //"vhl_id" => $this->vhl_id,
           "image" => $this->imagevhl,
           //"image_url"=> $this->imagevhl_url // Use the accessor for the full URL
              ];
    }}
   