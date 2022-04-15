<?php

use Illuminate\Support\Facades\Route;

Route::prefix('coletas')
    ->name('clientes.coletas.historicos.')
    ->namespace('Coletas')
    ->group(function () {
        Route::get('historico', 'HistoricoColetasController@index')->name('index');
        Route::get('historico/mensal', 'HistoricoColetasController@mensal')->name('mensal');
        Route::get('historico/diario', 'HistoricoColetasController@diario')->name('diario');
    });
