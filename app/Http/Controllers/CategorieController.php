<?php

namespace App\Http\Controllers;

use App\Models\Vhl;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Resources\VhlResource;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        $categorie = Categorie::find($categorie->id);
        return response()->json($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
    public function getVhlsByCategorie($categorieId)
    {
        // Vérifier si la catégorie existe
        $categorie = Categorie::find($categorieId);

        if (!$categorie) {
            return response()->json([
                'success' => false,
                'message' => 'Catégorie non trouvée',
            ], 404);
        }

        // Récupérer les véhicules de cette catégorie
        //$vhls = Vhl::where('categorie_id', $categorieId)->with('statuts')->get();

        $vhls = VhlResource::collection(
            Vhl::where('categorie_id', $categorieId)



                ->with(['statut', 'intitule', 'service', 'agence', 'categorie', 'images', 'kilometrages', 'comments' => function ($query) {
                    $query->orderBy('updated_at', 'desc')->whereNull('parent_id'); // Ensure only root comments are fetched

                }, 'utilisateur'])


                ->withCount(['images', 'comments' => function ($query) {
                    $query->whereNull('parent_id'); // Ensure only root comments are counted
                }])

                ->withMax('kilometrages', 'kilometrage')


                ->get()




        );

        return response()->json($vhls);
    }
}
