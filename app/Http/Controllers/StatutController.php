<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexo()
    {
          $statuso =Statut::with('vhls')->get();

        $data = $statuso->map(fn($statu) => [
            'id' => $statu->id,
            'name' => $statu->nom,
            'matricules' => $statu->vhls->map(fn($vhl) =>
                $vhl->matricule
            )
        ]);

        return response()->json(
             $data
        );
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
    public function showo(Statut $statu)
    {
        $data = $statu->vhls->map(function ($vhl) {
            return [
                'matricule' => $vhl->pivot->matricule,
                'autre_info' => $vhl->autre_champ // si besoin
            ];
        });

        return response()->json([
            'success' => true,
            'statut_id' => $statu->id,
            'statut_nom' => $statu->name,
            'vehicules' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statut $statu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statut $statu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statut $statu)
    {
        //
    }
    public function index() {
        $statuts = Statut::all();
        return response()->json($statuts);
    }

    public function show(Statut $statut) {
        return response()->json($statut);
    }
}