<?php

use Illuminate\Support\Facades\Route;

Route::prefix('coletas')
    ->name('entregadores.coletas.')
    ->namespace('Coletas')
    ->group(function () {
        Route::resource('pacotes', 'PacotesController');
    });
