<?php

namespace App\Http\Controllers;

use App\Models\Vhl;
use App\Models\Agence;
use Illuminate\Http\Request;
use App\Http\Resources\AgenceResource;
use App\Http\Controllers\Controller;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agences = Agence::all();
        return response()->json($agences);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agence = Agence::create($request->all());
        return response()->json($agence, 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(Agence $agence)
    {
        return response()->json($agence);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agence $agence)
    {
        $agence = Agence::find($agence->id);
        return response()->json($agence);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agence $agence)
    {
        // Mettre à jour l'agence avec les données de la requête
        $agence->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agence $agence)
    {
        // Supprimer l'agence
        $agence->delete();
    }


    public function getVhlsByAgence()
    {
        // Vérifier si l'agence existe
        //$agence = Agence::find($agenceId);



        $vhls = AgenceResource::collection(
            Vhl::all()
            // ->with('agence', 'service', 'categorie')
            //  ->get()
        );

        return response()->json($vhls);
    }
}
