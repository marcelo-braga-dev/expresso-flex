<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Coletas')
    ->group(function () {
        Route::resource('coletas', 'ColetasController');
        Route::resource('coletas-abertas', 'EmAbertoController');

        Route::put('coleta/alterar-status', 'ColetasController@cancelarColeta')
            ->name('coletas.cancelar-coleta');

        Route::put('coleta/cancelar-coleta', 'ColetasController@alterarStatus')
            ->name('coleta.alterar-status');

        Route::get('coleta/historico-coleta', 'HistoricoController@historico')
            ->name('coletas.historico-coleta');

        Route::get('coleta/historico-coleta-dia', 'HistoricoController@historicoDia')
            ->name('coletas.historico-coleta-dia');

        Route::get('coleta/detalhes', 'HistoricoController@info')
            ->name('coletas.info');

        Route::get('entrega/cancelar-entrega', 'EntregaController@cancel')
            ->name('entrega.cancelar-entrega');
    });


