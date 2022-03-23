<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Financeiro')
    ->controller('FinanceiroController')
    ->group(function () {
        Route::get('financeiro/historico', 'historicoMensal')
            ->name('financeiro.receber');

        Route::get('financeiro/historico/quinzena/{mes}/{ano}', 'historicoQuinzenal')
            ->name('financeiro.historicos.quinzena');

        Route::get('financeiro/historico/show/{mes}/{ano}/{quinzena}', 'show')
            ->name('financeiro.historicos.show');
    });
