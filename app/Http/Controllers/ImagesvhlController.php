<?php

namespace App\Http\Controllers;

use asset;
use App\Models\Vhl;
use App\Models\Imagesvhl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ImagesVhlRessource;


class ImagesvhlController extends Controller
{
    //

    /**
     * Téléverse plusieurs images pour un véhicule spécifique.
     *
     * @param Request $request
     * @param int $vhlId
     * @return \Illuminate\Http\JsonResponse
     */

     public function uploadImages(Request $request)
     {
         // Valider la requête
         $request->validate([
             'vhl_id' => 'required|exists:vhls,id', // Vérifier que le véhicule existe
             'imagevhl.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048', // 4MB max par image
         ]);

         // Récupérer le véhicule
         $vhl = Vhl::findOrFail($request->vhl_id);

         // Vérifier si des images ont été envoyées
         if (!$request->hasFile('imagevhl') || empty($request->file('imagevhl'))) {
             return response()->json([
                 'success' => false,
                 'message' => 'Aucune image trouvée.',
             ], 400);
         }

         $uploadedImages = [];

         // Traiter chaque image
         foreach ($request->file('imagevhl') as $image) {
             // Générer un nom unique pour l'image
             $fileName ='vhl_' . $vhl->id . '_' . date('Ymd_His').time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();

             // Enregistrer l'image dans le dossier `public`
             $imagePath = $image->storeAs('photosvhl',$fileName, 'public');

             // Enregistrer le chemin dans la base de données
             $uploadedImage = Imagesvhl::create([
                 'imagevhl' => $imagePath,
                 'vhl_id' => $vhl->id, // Lier l'image au véhicule
             ]);

             // Ajouter l'URL complète de l'image à la réponse
             $uploadedImage->imagevhl_url = asset("/storage/$imagePath");
             $uploadedImages[] = $uploadedImage;
         }

         return response()->json([
             'success' => true,
             'message' => 'Images téléversées avec succès',
             'data' => $uploadedImages,
         ]);
     }


    /**
     * Récupère toutes les images d'un véhicule.
     *
     * @param int $vhlId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getImages($vhlId)    {
         // Récupérer les images du véhicule avec l'URL complète
         $images = Imagesvhl::where('vhl_id',$vhlId)->get();

         //return response()->json($images);
         return ImagesVhlRessource::collection($images);
     }


     public function deleteImage($imageId)
{
    $image = Imagesvhl::findOrFail($imageId);

    // Supprimer le fichier du stockage
    Storage::disk('public')->delete($image->imagevhl);

    // Supprimer l'entrée de la base de données
    $image->delete();

    return response()->json([
        'success' => true,
        'message' => 'Image supprimée avec succès',
    ]);
}



}
