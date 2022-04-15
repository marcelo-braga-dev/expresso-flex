<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.cliente'],
    'namespace' => 'App\Http\Controllers\Clientes',
], function () {
    Route::get('', [\App\Http\Controllers\Clientes\HomeController::class, 'index'])
        ->name('cliente.home.index');

    include_once 'etiquetas.php';
    include_once 'coletas.php';
    include_once 'lojas.php';
    include_once 'integracoes.php';
    include_once 'importacao.php';
    include_once 'pacotes.php';
    include_once 'financeiro.php';
    include_once 'perfil.php';
});
