<?php

use Illuminate\Support\Facades\Route;

Route::prefix('coletas')
    ->name('admins.coletas.')
    ->namespace('Coletas')
    ->controller('HistoricoController')
    ->group(function () {
        Route::get('historico', 'index')->name('historico');

        Route::get('historico-diario', 'historicoDiario')->name('historico-diario');

        Route::get('detalhes', 'info')->name('detalhes');

        Route::get('historico-pacotes-coletados-dia', 'historicoPacotesColetadosDia')
            ->name('historico-pacotes-coletados-dia');

    });

Route::prefix('coletas/config')
    ->name('admins.coletas.config.')
    ->namespace('Coletas')
    ->controller('ConfigController')
    ->group(function () {
        Route::get('geral', 'index')->name('index');

        Route::put('config-geral', 'update')->name('update');
    });
