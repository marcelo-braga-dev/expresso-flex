<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.entregador'],
    'namespace' => 'App\Http\Controllers\Entregadores',
], function () {
    include_once 'coletas.php';
    include_once 'pacotes-coleta.php';
    include_once 'qrcode.php';
    include_once 'entregas.php';
});

