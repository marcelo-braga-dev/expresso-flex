<?php

use Illuminate\Support\Facades\Route;

Route::name('conferentes.solicitacoes.')
    ->namespace('Coletas')
    ->controller('HistoricoController')
    ->group(function () {

        Route::get('solicitacoes/historico', 'index')
            ->name('historico');

        Route::get('solicitacoes/historico-diario', 'historicoDiario')
            ->name('historico-diario');

        Route::get('solicitacoes/show/{id}', 'show')
            ->name('show');
    });

Route::name('conferentes.')
    ->namespace('Coletas')
    ->controller('StatusController')
    ->group(function () {

        Route::get('checkin/pacotes-base', 'pacotesBase')
            ->name('checkin.pacotes-base');
    });



