<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ImagesVhlRessource;
use Illuminate\Http\Resources\Json\JsonResource;

class VhlResource extends JsonResource
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
            'matricule' => $this->resource->matricule,
            'marque' => $this->resource->marque,
            'type' => $this->resource->type,
            'ww' => $this->resource->ww,
            'chassis' => $this->resource->chassis,
            'puissance' => $this->resource->puissance,
            'dateMc' => $this->resource->date_mc,
            'equipement' => $this->resource->equipement,
            'observation' => $this->resource->observation,
            'agenceId' => $this->resource->agence_id,
            'categorieId' => $this->resource->categorie_id,
            'intituleId' => $this->resource->intitule_id,
            'serviceId' => $this->resource->service_id,
            'statutId' => $this->resource->statut_id,
            // 'utilisateur' => $this->utilisateur_id,

            'utilisateur' => $this->whenLoaded('utilisateur', function () {
                return $this->resource->utilisateur->nom; // Changed from 'utilisateur_id' to 'utilisateur->nom'
            }, null),






            'categorie' => $this->whenLoaded('categorie', function () {
                return $this->resource->categorie->nom;
            }, null),
            'intitule' => $this->whenLoaded('intitule', function () {
                return $this->resource->intitule->acronym; // Changed from 'nom' to 'acronym'
            }, null),
            'service' => $this->whenLoaded('service', function () {
                return $this->resource->service->nom;
            }, null),
            'agence' => $this->whenLoaded('agence', function () {
                return $this->resource->agence->nom;
            }, null),
            'lastKilometrage' => $this->whenLoaded('kilometrages', function () {
                return $this->resource->kilometrages->last()->kilometrage ?? null;
            }, null),
            'imagesCount' => $this->whenCounted('images'),


            'commentsCount' => $this->whenCounted('comments'),

            'comments' => CommentResource::collection($this->resource->comments),
            // 'comments' => $this->whenLoaded('comments', function() {
            //     return $this->comments->map(function($comment) {
            //         return [
            //             'id' => $comment->id,
            //             'comment' => $comment->comment,
            //             'user' => $comment->user_id,
            //             'statut' => $comment->statut_id,
            //             'traite' => $comment->active,
            //             'vhl' => $comment->vhl_id,
            //             'created_at' => $comment->created_at,
            //             'updated_at' => $comment->updated_at,
            //         ];
            //     });
            // }, null),







            'images' => ImagesVhlRessource::collection($this->resource->images),

            // Assuming you have a relationship defined
            // 'categorie' => new CategorieResource('categorie'),
            // 'intitule' => new IntituleResource($this->whenLoaded('intitule')),
            // 'service' => new ServiceResource($this->whenLoaded('service')),








        ];
    }
}
