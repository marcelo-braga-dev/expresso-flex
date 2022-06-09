<?php
use Illuminate\Support\Facades\Route;

Route::prefix('financeiro/clientes')
    ->name('admins.financeiros.')
    ->namespace('Financeiros')
    ->controller('ClientesController')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('mes/{id}', 'mes')->name('mes');
        Route::get('quinzena/{id}', 'quinzena')->name('quinzena');
        Route::get('show/{id}', 'show')->name('show');
        Route::put('pago/{id}', 'pago')->name('pago');
    });

Route::prefix('financeiro/entregadores')
    ->name('admins.financeiros.entregadores.')
    ->namespace('Financeiros')
    ->controller('EntregadoresController')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('mes', 'historicoMes')->name('mes');
        Route::get('quinzena', 'historicoQuinzena')->name('quinzena');
        Route::get('detalhes-mes', 'historicoDetalhesMes')->name('detalhesMes');
        Route::get('pagamento-dinheiro', 'pagamentoDinheiro')->name('pagamentoDinheiro');
    });
