<?php

namespace App\Http\Controllers;

use App\Models\Intitule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntituleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intitules = Intitule::all();
        return response()->json($intitules);
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
        $intitule = Intitule::create($request->all());
        return response()->json($intitule, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Intitule $intitule)
    {
        return response()->json($intitule);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intitule $intitule) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intitule $intitule)
    {
        $intitule->update($request->all());
        return response()->json($intitule);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intitule $intitule)
    {
        $intitule->delete();
        return response()->json(null, 204);
    }
}
