<?php

namespace App\Http\Controllers;

use is_null;
use App\Models\Vhl;
use App\Models\Agence;
use App\Models\Statut;
use App\Models\Intitule;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Kilometrage;
use Illuminate\Http\Request;
use App\Http\Resources\VhlResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\RechercheResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommentaireController;

class VhlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vhls = Vhl::all();
        return response()->json($vhls);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricule' => 'required|string|max:20',
            'marque' => 'nullable|string|max:40',
            // 'type' => 'nullable|string|max:60',
            // 'ww' => 'nullable|string|max:40',
            // 'chassis' => 'nullable|string|max:40',
            // 'puissance' => 'nullable|string|max:10',
            'date_mc' => 'nullable|string|max:255',
            // 'equipement' => 'nullable|string|max:20',
            // 'observation' => 'nullable|string|max:255',
            'agence_id' => 'required|exists:agences,id',
            'categorie_id' => 'nullable|exists:categories,id',
            'intitule_id' => 'nullable|exists:intitules,id',
            'service_id' => 'nullable|exists:services,id',
            // 'utilisateur_id' => 'nullable|exists:utilisateurs,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $vhl = Vhl::create($request->all());
        return response()->json($vhl, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vhl = Vhl::find($id);
        if ($vhl === null) {
            return response()->json(['message' => 'Vhl not found'], 404);
        }
        return response()->json($vhl);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vhl = Vhl::find($id);
        if ($vhl === null) {
            return response()->json(['message' => 'Vhl not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'matricule' => 'sometimes|required|string|max:20',
            'marque' => 'nullable|string|max:40',
            'type' => 'nullable|string|max:60',
            'ww' => 'nullable|string|max:40',
            'chassis' => 'nullable|string|max:40',
            'puissance' => 'nullable|string|max:10',
            'date_mc' => 'nullable|string|max:255',
            'equipement' => 'nullable|string|max:20',
            'observation' => 'nullable|string|max:255',
            'agence_id' => 'sometimes|required|exists:agences,id',
            'categorie_id' => 'nullable|exists:categories,id',
            'intitule_id' => 'nullable|exists:intitules,id',
            'service_id' => 'nullable|exists:services,id',
            'utilisateur_id' => 'nullable|exists:utilisateurs,id',
            'statut_id' => 'nullable|exists:statuts,id', // Added validation for statut_id
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $vhl->update($request->all());
        return response()->json($vhl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vhl = Vhl::find($id);
        if (is_null($vhl)) {
            return response()->json(['message' => 'Vhl not found'], 404);
        }

        $vhl->delete();
        return response()->json(['message' => 'Vhl deleted successfully']);
    }




    public function showVhlRes(string $id)
    {
        $vhl = Vhl::findOrFail($id);
        if (is_null($vhl)) {
            return response()->json(['message' => 'Vhl not found'], 404);
        }
        return new VhlResource($vhl::with(['statut', 'intitule', 'service', 'agence', 'categorie', 'images', 'kilometrages', 'comments' => function ($query) {
            $query->orderBy('updated_at', 'desc')->whereNull('parent_id'); // Ensure only root comments are fetched

        }, 'utilisateur'])


            ->withCount(['images', 'comments' => function ($query) {
                $query->whereNull('parent_id'); // Ensure only root comments are counted
            }])
            ->withMax('kilometrages', 'kilometrage')
            ->findOrFail($id));
    }



    public function getVhlsByStatut($statutId)
    {
        $vhls = Vhl::whereHas('statut', function ($query) use ($statutId) {
            $query->where('statut_id', $statutId);
        })->get();

        return response()->json($vhls);
    }




    public function getVhlWithStatut($vhlId)

    {
        $vhlId = Vhl::with('statut')->get();
        if (is_null($vhlId)) {
            return response()->json(['message' => 'Vhl not found'], 404);
        }

        $data = $vhlId->map(fn($statu) => [
            'id' => $statu->id,
            'matricule' => $statu->matricule,
            'statut' => $statu->statut->map(
                fn($vhl) =>
                $vhl->nom
            )
        ]);

        return response()->json(
            $data
        );
    }

    public function getKmByVhl($vhlId)
    {
        // Vérifier si la catégorie existe
        $vhl = Vhl::findOrFail($vhlId);


        if (!$vhl) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée',
            ], 404);
        }

        // Récupérer les véhicules de cette catégorie
        $kilometrages = Kilometrage::where('vhl_id', $vhlId)->get();

        return response()->json($kilometrages);
    }

    public function getDropDownbutonVhl()
    {
        $categories = Categorie::all();
        $agences = Agence::all();
        $titulaires = Intitule::all();
        $statuts = Statut::all(); // Assuming you have a Statut model
        return response()->json(["categories" => $categories, "agences" => $agences, "titulaires" => $titulaires, "statuts" => $statuts]);
    }





    public function searchVhls(Request $request)
    {
        try {
            $validated = $request->validate([
                'matricule' => 'nullable|string|max:20',
                'marque' => 'nullable|string|max:40',
                'categorie_id' => 'nullable|integer|exists:categories,id',
                'agence_id' => 'nullable|integer|exists:agences,id',
                'statut_id' => 'nullable|integer|exists:statuts,id',
                'utilisateur' => 'nullable|string|max:40'
            ]);

            // Initialiser la requête avec les relations
            $query = Vhl::with([
                'statut',
                'service',
                'agence',
                'categorie',
                'intitule',
                'utilisateur' // Assurez-vous que cette relation existe dans le modèle Vhl
            ]);

            // Filtres
            if ($request->filled('matricule')) {
                $matricule = strtolower(str_replace(' ', '', $request->matricule));
                $query->whereRaw('LOWER(REPLACE(matricule, " ", "")) LIKE ?', ['%' . $matricule . '%']);
            }

            if ($request->filled('marque')) {
                $query->where('marque', 'LIKE', '%' . $request->marque . '%');
            }

            if ($request->filled('categorie_id')) {
                $query->where('categorie_id', $request->categorie_id);
            }

            if ($request->filled('agence_id')) {
                $query->where('agence_id', $request->agence_id);
            }

            if ($request->filled('statut_id')) {
                $query->whereHas('statut', function ($q) use ($request) {
                    $q->where('statut_id', $request->statut_id);
                });
            }

            if ($request->filled('utilisateur')) {
                $query->whereHas('utilisateur', function ($q) use ($request) {
                    $nomUtilisateur = strtolower(str_replace(' ', '', $request->utilisateur));
                    $q->whereRaw('LOWER(REPLACE(nom, " ", "")) LIKE ?', ['%' . $nomUtilisateur . '%']);
                });
            }

            $vhls = $query->get();

            return response()->json([
                'success' => true,
                'data' => RechercheResource::collection($vhls),
                'message' => 'Recherche effectuée avec succès'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la recherche: ' . $e->getMessage()
            ], 500);
        }
    }




    public function getCommentsVhl(int $vhl, Request $request)
    {
        try {
            $mainComment = Commentaire::with(['user', 'vhl', 'statut'])

                ->where('vhl_id',  $vhl)
                ->whereNull('parent_id') // Seulement les commentaires racines
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json($mainComment);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve comments',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function getAgences()
    {

        $agences = Agence::all();

        return response()->json($agences);
    }


    public function indexPages()
    {
        $vhls = Vhl::paginate(15);
        return response()->json($vhls);
    }
}
