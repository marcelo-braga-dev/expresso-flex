<?php

use Illuminate\Support\Facades\Route;

Route::prefix('pacotes')
    ->name('admins.pacotes.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::get('sendo-coletados', 'PacotesController@sobColeta')->name('sob_coleta');
        Route::get('na-base', 'PacotesController@base')->name('base');
        Route::get('sendo-entregues', 'PacotesController@sobEntrega')->name('sob_entrega');
    });

Route::prefix('pacotes/historico/clientes')
    ->name('admins.pacotes.historico.clientes.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::get('', 'HistoricoClientesController@index')->name('index');
        Route::get('meses/{id}', 'HistoricoClientesController@meses')->name('meses');
        Route::get('dias/{id}', 'HistoricoClientesController@dias')->name('dias');
        Route::get('pacotes/{id}', 'HistoricoClientesController@pacotes')->name('pacotes');
    });
