<?php

use App\Http\Controllers\Admin\ImportExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VhlController;





Route::get('/main', function () {
    return view('main');
});






// Routes d'export
Route::get('/export-users', [ImportExportController::class, 'export']);
Route::get('/import-users', [ImportExportController::class, 'import']);

Route::get('/generate-pdf', [VhlController::class, 'downloado']);

Route::get('/maino', function () {
    return view('pdf.pdfTest', [
        'data' => [[
                'quantity' => 1,
                'description' => '1 Year Subscription',
                'price' => 129.00
        ],

    ]]);
});








Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
