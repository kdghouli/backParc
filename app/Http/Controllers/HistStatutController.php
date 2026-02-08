<?php

namespace App\Http\Controllers;

use App\Models\Vhl;
use App\Models\HistStatut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistStatutController extends Controller
{
     public function store(Request $request){

// // Enregistrement d'un changement de statut
// HistStatut::create([
//     'vhl_id' => $vhl->id,
//     'ancien_statut_id' => $ancienStatut,
//     'nouveau_statut_id' => $nouveauStatut,
//     'user_id' => auth()->id(),
//     'commentaire' => 'Réparation terminée'
// ]);


     }



//         public function index($id)
//         {
//             // Récupération de l'historique des statuts pour un véhicule spécifique
//             // Assurez-vous que le modèle Vhl a une relation définie pour les historiques de statut

//      $historique = Vhl::find($id)->statutHistoriques()
//                   ->with(['ancienStatut', 'nouveauStatut', 'user'])
//                   ->orderBy('created_at', 'desc')
//                   ->get();

// }
}
