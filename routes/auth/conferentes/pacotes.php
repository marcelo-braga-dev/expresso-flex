<?php

use Illuminate\Support\Facades\Route;

Route::name('conferentes.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::resource('pacote', 'PacotesController');
    });

Route::name('conferentes.')
    ->namespace('Pacotes')
    ->controller('StatusController')
    ->group(function () {
        Route::get('pacotes/pacotes-sob-coleta', 'sobColeta')
            ->name('pacotes.pacotes-sob-coleta');

        Route::get('pacotes/pacotes-sob-entrega', 'sobEntrega')
            ->name('pacotes.pacotes-sob-entrega');

        Route::get('pacotes/pacotes-base', 'naBase')
            ->name('pacotes.pacotes-base');
    });

Route::name('conferentes.')
    ->namespace('Pacotes')
    ->controller('HistoricoController')
    ->group(function () {

        Route::get('pacotes/historico', 'index')
            ->name('pacotes.historico');

        Route::get('pacotes/historico-diario', 'historicoDiario')
            ->name('pacotes.historico-diario');
    });



