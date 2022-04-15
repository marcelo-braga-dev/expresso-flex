<?php

use Illuminate\Support\Facades\Route;

Route::prefix('financeiro')
    ->name('clientes.financeiro.')
    ->namespace('Financeiros')
    ->controller('FinanceiroController')
    ->group(function () {
        Route::get('', 'historicoMensal')->name('index');
        Route::get('quinzena/{mes}/{ano}', 'histricoQuinzenal')->name('quinzena');
        Route::get('fatura/{mes}/{ano}/{quinzena}', 'fatura')->name('fatura');
    });
