<?php

namespace App\Http\Controllers;


use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::all();

        return response()->json($utilisateurs);
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
        $validator = Validator::make($request->all(), [

            'nom' => 'required|string|max:70',
            'poste' => 'nullable|string|max:50',
            'tel' => 'nullable|string|max:50',
            'mail' => 'nullable|string|max:50',
            'service_id' => 'nullable|exists:services,id',
            'agence_id' => 'required|exists:agences,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $utilisa = Utilisateur::create($request->all());
        return response()->json($utilisa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        if ($utilisateur === null) {
            return response()->json(['message' => 'Utilisateur not found'], 404);
        }
        return response()->json($utilisateur, 200);
    }



    public function edit(utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:70',
            'poste' => 'nullable|string|max:50',
            'tel' => 'nullable|string|max:50',
            'mail' => 'nullable|string|max:50',
            'service_id' => 'nullable|exists:services,id',
            'agence_id' => 'required|exists:agences,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $utilisateur = Utilisateur::find($id);
        if ($utilisateur === null) {
            return response()->json(['message' => 'Utilisateur not found'], 404);
        }

        $utilisateur->update($request->all());
        return response()->json($utilisateur, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = Utilisateur::find($id);
        if ($utilisateur === null) {
            return response()->json(['message' => 'Utilisateur not found'], 404);
        }

        // Check if the utilisateur has associated agence or service
        // if ($utilisateur->agence || $utilisateur->service) {
        //     return response()->json(['message' => 'Cannot delete utilisateur with associated agence or service'], 400);
        // }
        {
            $utilisateur->delete();
            return response()->json(['message' => 'Utilisateur deleted successfully'], 204);
        }
    }
}
