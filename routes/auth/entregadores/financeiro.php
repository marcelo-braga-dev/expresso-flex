<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Financeiro')
    ->group(function () {
        Route::get('financeiro/receber', 'FinanceiroController@receber')
            ->name('financeiro.receber');

        Route::get('financeiro/receber/detalhes', 'FinanceiroController@detalhesMensal')
            ->name('financeiro.receber.detalhes');
    });
