<?php

use Illuminate\Support\Facades\Route;

Route::name('conferentes.')
    ->namespace('Coletas')
    ->controller('HistoricoController')
    ->group(function () {

        Route::get('solicitacoes/historico', 'index')
            ->name('solicitacoes.historico');

        Route::get('solicitacoes/historico-diario', 'historicoDiario')
            ->name('solicitacoes.historico-diario');
    });

Route::name('conferentes.')
    ->namespace('Coletas')
    ->controller('StatusController')
    ->group(function () {

        Route::get('checkin/pacotes-base', 'pacotesBase')
            ->name('checkin.pacotes-base');
    });



