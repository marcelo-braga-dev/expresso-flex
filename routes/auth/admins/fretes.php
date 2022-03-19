<?php

use Illuminate\Support\Facades\Route;

Route::prefix('fretes')
    ->name('admins.fretes.')
    ->namespace('Fretes')
    ->group(function () {
        Route::resource('clientes', 'ClientesController');
        Route::resource('entregadores', 'EntregadoresController');
    });
