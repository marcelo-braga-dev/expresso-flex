<?php

use Illuminate\Support\Facades\Route;

Route::prefix('financeiro')
    ->name('clientes.financeiro.')
    ->namespace('Financeiros')
    ->group(function () {
        Route::get('', 'FinanceiroController@index')->name('index');
        Route::get('quinzena', 'FinanceiroController@quinzena')->name('quinzena');
        Route::get('fatura', 'FinanceiroController@fatura')->name('fatura');
    });
