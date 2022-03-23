<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Pacotes')
    ->controller('HistoricoController')
    ->group(function () {

        Route::get('pacotes/historico', 'historico')
            ->name('pacotes.historico');

        Route::get('pacotes/historico-diario', 'historicoDia')
            ->name('pacotes.historico-dia');
    });

Route::name('entregadores.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::resource('pacote', 'PacotesController');
    });
