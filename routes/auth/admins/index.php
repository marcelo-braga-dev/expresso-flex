<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.admin'],
    'namespace' => 'App\Http\Controllers\Admins',
], function () {
    Route::get('', [\App\Http\Controllers\Admins\HomeController::class, 'index'])
        ->name('admin.home.index');

    include_once 'integracoes.php';
    include_once 'usuarios.php';
    include_once 'pacotes.php';
    include_once 'fretes.php';
    include_once 'coletas.php';
    include_once 'financeiro.php';
});
