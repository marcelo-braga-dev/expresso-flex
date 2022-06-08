<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Coletas')
    ->group(function () {
        Route::resource('coletas', 'ColetasController');
    });

Route::name('entregadores.')
    ->namespace('Coletas')
    ->controller('ColetasController')
    ->group(function () {

        Route::put('coleta/alterar-status', 'cancelarColeta')
            ->name('coletas.cancelar-coleta');

        Route::put('coleta/cancelar-coleta', 'alterarStatus')
            ->name('coleta.alterar-status');
    });

Route::name('entregadores.coletas.')
    ->namespace('Coletas')
    ->controller('HistoricoController')
    ->group(function () {

        Route::get('coleta/historico-coleta', 'historico')
            ->name('historico-coleta');

        Route::get('coleta/historico-coleta-dia', 'historicoDia')
            ->name('historico-coleta-dia');

        Route::get('coleta/detalhes', 'info')
            ->name('info');
    });
