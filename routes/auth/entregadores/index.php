<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.entregador'],
    'namespace' => 'App\Http\Controllers\Entregadores',
], function () {
    Route::get('', [\App\Http\Controllers\Entregadores\HomeController::class, 'index'])
        ->name('entregador.home.index');

    include_once 'coletas.php';
    include_once 'pacotes-coleta.php';
    include_once 'entregas.php';
    include_once 'financeiro.php';
    include_once 'pacotes.php';
    include_once 'perfil.php';
});

Route::group([
    'namespace' => 'App\Http\Controllers\Entregadores',
], function () {
    include_once 'qrcode.php';
});

