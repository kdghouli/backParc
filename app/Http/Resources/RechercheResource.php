<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RechercheResource extends JsonResource
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
            'matricule' => $this->matricule,
            'marque' => $this->marque,
            'utilisateur' => $this->whenLoaded('utilisateur', function() {
                return $this->utilisateur->nom;
            }, null),


            'categorie' => $this->whenLoaded('categorie', function() {
                return $this->categorie->nom;
            }, null),
            'intitule' => $this->whenLoaded('intitule', function() {
                return $this->intitule->nom;
            }, null),
            'service' => $this->whenLoaded('service', function() {
                return $this->service->nom;
            }, null),
            'agence' => $this->whenLoaded('agence', function() {
                return $this->agence->nom;
            }, null),

        ];
    }
}
