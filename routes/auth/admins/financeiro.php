<?php
use Illuminate\Support\Facades\Route;

Route::prefix('financeiro/clientes')
    ->name('admins.financeiros.')
    ->namespace('Financeiros')
    ->controller('ClientesController')
    ->group(function () {
        Route::get('', 'index')->name('index');
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
