<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.cliente'],
    'namespace' => 'App\Http\Controllers\Clientes',
], function () {
    include_once 'etiquetas.php';
    include_once 'coletas.php';
    include_once 'lojas.php';
    include_once 'integracoes.php';
    include_once 'importacao.php';
});
