<?php

use Illuminate\Support\Facades\Route;

Route::name('admins.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::resource('pacote', 'PacotesController');
    });

Route::prefix('pacotes/status')
    ->name('admins.pacotes.')
    ->namespace('Pacotes')
    ->controller('StatusController')
    ->group(function () {
        Route::get('sendo-coletados', 'sobColeta')->name('sob_coleta');
        Route::get('na-base', 'base')->name('base');
        Route::get('sendo-entregues', 'sobEntrega')->name('sob_entrega');
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

Route::prefix('pacotes/historico')
    ->name('admins.pacotes.historico.')
    ->namespace('Pacotes')
    ->controller('HistoricoController')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('diario', 'diario')->name('diario');
        Route::get('detalhes', 'infos')->name('detalhes');
    });
