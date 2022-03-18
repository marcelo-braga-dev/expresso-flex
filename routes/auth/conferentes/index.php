<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.conferente'],
    'namespace' => 'App\Http\Controllers\Conferentes',
], function () {
    Route::get('', [\App\Http\Controllers\Conferentes\HomeController::class, 'index'])
        ->name('conferente.home.index');

    include_once 'pacotes.php';
    include_once 'coletas.php';

    include_once 'checkin.php';
});

