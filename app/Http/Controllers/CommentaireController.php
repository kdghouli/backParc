<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource with pagination
     */
    public function index()
    {
        try {
        $commentaires = Commentaire::with(['user', 'vhl','replies' => function($query) {
                $query->with(['user', 'replies']);
            }])
            ->whereNull('parent_id') // Seulement les commentaires racines
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($commentaires);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve comments',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:255',
            'vhl_id' => 'nullable|exists:vhls,id',
            'active' => 'nullable|boolean',
            'user_id' => 'required|exists:users,id',
            'statut_id' => 'nullable|exists:statuts,id',
            'parent_id' => 'nullable|exists:commentaires,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $comment = Commentaire::create($request->all());

            // Charger les relations pour la réponse
            $comment->load(['user', 'vhl']);

            return response()->json([

                'data' => $comment,

            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $commentaire = Commentaire::with(['user', 'vhl', 'replies' => function($query) {
                $query->with(['user', 'replies']);
            }])
                ->findOrFail($id);

            return response()->json(
                $commentaire
            );
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $commentaire = Commentaire::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'comment' => 'sometimes|string|max:255',
                'active' => 'sometimes|boolean',
                'statut_id' => 'sometimes|exists:statuts,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $commentaire->update($request->all());
            $commentaire->load('user', 'vhl');

            return response()->json([
                'success' => true,
                'data' => $commentaire,
                'message' => 'Comment updated successfully'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $commentaire = Commentaire::findOrFail($id);

            // Suppression douce (soft delete) si activé dans le modèle
            $commentaire->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comment deleted successfully'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

 public function getRepliesComment(int $commentId,Request $request){
        try {
        $replies = Commentaire::with(['user', 'vhl','statut'])

            ->where( 'parent_id',  $commentId)
            ->orderBy('created_at', 'desc')
            ->get();

           // $mainComment = Commentaire::with(['user', 'vhl' ])


        return response()->json($replies);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve comments',
                'error' => $e->getMessage()
            ], 500);
        }
    }



}

