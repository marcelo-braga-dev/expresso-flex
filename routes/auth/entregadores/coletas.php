<?php

use Illuminate\Support\Facades\Route;

Route::prefix('coletas')
    ->name('entregadores.')
    ->namespace('Coletas')
    ->group(function () {
        Route::resource('coletas', 'ColetasController');
        Route::resource('coletas-abertas', 'EmAbertoController');
    });
