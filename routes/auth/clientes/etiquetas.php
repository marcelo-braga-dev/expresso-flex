<?php

use Illuminate\Support\Facades\Route;

Route::prefix('etiquetas')
    ->name('clientes.etiquetas.')
    ->namespace('Etiquetas')
    ->group(function () {
        Route::resource('expressoflex', 'ExpressoFlexController');
        Route::resource('historico', 'HistoricoController');
    });
