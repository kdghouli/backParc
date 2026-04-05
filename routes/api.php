<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VhlController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ImagesvhlController;
use App\Http\Controllers\StatutVhlController;
use App\Http\Controllers\DailyCheckController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin\ImportExportController;






//? ------------------------------------------------------------------------------         Authentification
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/getusers', [AuthController::class, 'getUsers']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/update-profile', [AuthController::class, 'updateProfile']);





// Route::get('/vhl',[App\Http\Controllers\VhlController::class, 'index']);
// Route::post('/vhlcreate',[App\Http\Controllers\VhlController::class, 'store']);



//? ----------------------------------------------------------------------------------------------- Images
Route::post('/vhls/upload-images', [ImagesvhlController::class, 'uploadImages']);
Route::get('/vhls/{vhlId}/images', [ImagesvhlController::class, 'getImages']);

//? -----------------------------------------------------------------------------------------------    VHL

Route::apiResource('/vhls', VhlController::class);
Route::get('/vhl/{vhlId}', [VhlController::class, 'showVhlRes']);
Route::get('/vhlspages', [VhlController::class, 'indexPages']);




//? ----------------------------------------------------------------------------------------------- Status

Route::get('/statut/{statutId}', [StatutController::class, 'show']);
Route::get('/statuts', [StatutController::class, 'index']);
Route::get('/vhl/{vhlId}/statuts', [VhlController::class, 'getVhlWithStatuts']);
Route::apiResource('statuts', StatutController::class);



//? ----------------------------------------------------------------------------------------------- Kilometrage
Route::get('/km/{vhlId}', [VhlController::class, 'getKmByVhl']);



//? ---------------------------------------------------------------------------------------------------- Categorie
Route::get('/categ/vhls/{categorieId}', [CategorieController::class, 'getVhlsByCategorie']);
Route::apiResource('categories', CategorieController::class);


//? ----------------------------------------------------------------------------------------------- Agences
Route::get('/agencesi', [App\Http\Controllers\AgenceController::class, 'getVhlsByAgence']);
Route::apiResource('agences', App\Http\Controllers\AgenceController::class);



//? ----------------------------------------------------------------------------------------------- Dropdown-Creation véhicule
Route::get('/dropdowns', [VhlController::class, 'getDropDownbutonVhl']);
Route::get('/getagences', [VhlController::class, 'getAgences']);


//? ----------------------------------------------------------------------------------------------- Services
Route::apiResource('services', ServiceController::class);






//? ----------------------------------------------------------------------------------------------- Utilisateurs
Route::apiResource('utilisateurs', App\Http\Controllers\UtilisateurController::class);

//? ----------------------------------------------------------------------------------------------- Intitules
Route::apiResource('intitules', App\Http\Controllers\IntituleController::class);

//? ----------------------------------------------------------------------------------------------- recherche
Route::get('/search', [VhlController::class, 'searchVhls']);


//? ----------------------------------------------------------------------------------------------- Exportation

Route::get('/pdf', [DailyCheckController::class, 'generatePdf']);
Route::get('/excel', [DailyCheckController::class, 'exportUsers']);
Route::get('/main', [DailyCheckController::class, 'ExportBlade']);
Route::post('/export-users', [ImportExportController::class, 'exportUsers']);


//? ----------------------------------------------------------------------------------------------- Daily Checks
Route::prefix('dailychecks')->group(function () {
    Route::get('/', [DailyCheckController::class, 'index']);
    Route::post('/', [DailyCheckController::class, 'store']);
    Route::get('/{id}', [DailyCheckController::class, 'show']);
    Route::put('/{id}', [DailyCheckController::class, 'update']);
    Route::delete('/{id}', [DailyCheckController::class, 'destroy']);
    Route::get('/vhl/{vhlId}', [DailyCheckController::class, 'getByVhl']);

    // Nouvelles routes
    Route::get('/filter', [DailyCheckController::class, 'filter']);
    Route::get('/stats/monthly', [DailyCheckController::class, 'monthlyStats']);
    Route::get('/export/excel', [DailyCheckController::class, 'exportExcel']);
    Route::get('/export/pdf', [DailyCheckController::class, 'exportPdf']);
});




//? ----------------------------------------------------------------------------------------------- Commentaires

Route::get('/stat', [StatutVhlController::class, 'getListStatut']);
Route::apiResource('comments', CommentaireController::class);
Route::get('/replies/{commentId}', [CommentaireController::class, 'getRepliesComment']);
Route::get('/vhls/{vhl}/comments', [VhlController::class, 'getCommentsVhl']);








// Routes CRUD pour les tâches
Route::apiResource('tasks', TaskController::class);

// Routes personnalisées
Route::patch('tasks/{task}/status', [TaskController::class, 'updateStatus']);
Route::get('statistics/tasks', [TaskController::class, 'statistics']);



// Route de test pour vérifier que l'API fonctionne
Route::get('test', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now()->toISOString()
    ]);
});


//? --------------------------------------------------------------------------    Mail
Route::view('/email', 'email.createlogin');