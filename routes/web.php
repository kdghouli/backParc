<?php

use Illuminate\Support\Facades\Route;




Route::get('/main', function () {
    return view('main');
});







Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
