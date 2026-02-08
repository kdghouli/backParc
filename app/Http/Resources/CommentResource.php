<?php

namespace App\Http\Resources;

use App\Models\Vhl;
use Illuminate\Http\Request;
use App\Http\Resources\RepliesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

                        'id' => $this->resource->id,
                        'comment' => $this->resource->comment,
                        'userId' => $this->resource->user_id,
                        'statutId' => $this->resource->statut_id,
                        'active' => $this->resource->active,
                        'vhlId' => $this->resource->vhl_id,
                        'createdAt' => $this->resource->created_at,
                        'updatedAt' => $this->resource->updated_at,
                        'parentId' => $this->resource->parent_id,
                        'user' => $this->whenLoaded('user', function () {
                        return $this->resource->user->name; // Changed from 'utilisateur_id' to 'utilisateur->nom'
                            }, null),
                        'email' => $this->whenLoaded('user', function () {
                                return $this->resource->user->email; // Changed from 'utilisateur_id' to 'utilisateur->nom'
                            }, null),
                        'statut' => $this->whenLoaded('statut', function () {
                                return $this->resource->statut->nom; // Changed from 'utilisateur_id' to 'utilisateur->nom'
                            }, null),
                        'matricule' => $this->whenLoaded('vhl', function () {
                                return $this->resource->vhl->matricule; // Changed from 'utilisateur_id' to 'utilisateur->nom'
                            }, null),
                        'marque' => $this->whenLoaded('vhl', function () {
                                return $this->resource->vhl->marque; // Changed from 'utilisateur_id' to 'utilisateur->nom'
                            }, null),


                    ];

                        //'replies' => RepliesResource::collection($this->whenLoaded('replies')),
        //                 'user' => $this->whenLoaded('user', function () {
        //                     return [
        //                         'id' => $this->resource->user->id,
        //                         'name' => $this->resource->user->name,
        //                         'email' => $this->resource->user->email


        // ];
        //                 }, null),

    }
}
