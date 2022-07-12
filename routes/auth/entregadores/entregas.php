<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Entregas')
    ->group(function () {
        Route::resource('entregas', 'EntregasController');

        Route::get('entrega/cancelar/{id}', 'EntregasController@cancel')
            ->name('entrega.cancelar');
    });

Route::name('entregadores.entrega.historico.')
    ->namespace('Entregas')
    ->controller('HistoricoController')
    ->group(function () {
        Route::get('entrega/historico-pacotes-dia', 'index')
            ->name('index');

        Route::get('entrega/historico-pacotes-dia/show', 'show')
            ->name('show');
    });
