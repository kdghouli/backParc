<?php

namespace App\Http\Controllers;

use App\Models\Vhl;
use App\Models\Statut;
use App\Models\StatutVhl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatutVhlController extends Controller
{


    /**
     *
     * Display a listing of the resource.
     */
    public function index()
    {
        return  Statut::with('vhls')->get();
        // return $Tous = StatutVhl::with('vhl')->get();
        // return $Tous = StatutVhl::with('statut')->get();
        // return $Tous = StatutVhl::with('statut')->with('vhl')->get();
        // return $Tous = StatutVhl::with('statut')->with('vhl')->get();
        // return $Tous = StatutVhl::with('statut')->with('vhl')->get();


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
    public function show($statuVhl)


    {
        // return $statuVhl;
        // return $statuVhl->statut;
        // return $statuVhl->vhl;
        // return $statuVhl->statut->vhls;
         return $statuVhl;
        // return $statuVhl->statut()->with('vhls')->get();
        // return $statuVhl->vhl()->with('statuts')->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatutVhl $statuVhl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatutVhl $statuVhl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatutVhl $statuVhl)
    {
        //
    }




    public function getListStatut()
    {
        $statut = Statut::all();
        if ($statut->isEmpty()) {
            return response()->json(['message' => 'No status found for this vehicle'], 404);
        }
        return response()->json($statut, 200);
    }
}
