<?php

use Illuminate\Support\Facades\Route;

Route::name('conferentes.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::resource('pacote', 'PacotesController');
    });

Route::name('conferentes.pacotes.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::resource('sob-coleta', 'SobColetaController');
        Route::resource('sob-entrega', 'SobEntregaController');
        Route::resource('por-cliente', 'PorClientesController');
        Route::resource('na-base', 'NaBaseController');
    });



Route::name('conferentes.')
    ->namespace('Pacotes')
    ->controller('StatusController')
    ->group(function () {

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



