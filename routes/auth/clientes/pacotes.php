<?php

use Illuminate\Support\Facades\Route;

Route::prefix('pacotes')
    ->name('clientes.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::resource('pacotes', 'PacotesController');

        Route::get('pesquisar', 'PesquisarPacotesController@index')
            ->name('pacotes.pesquisar.index');

        Route::get('pesquisar/id', 'PesquisarPacotesController@pesquisar')
            ->name('pacotes.pesquisar.show');
    });

Route::prefix('pacotes/historico')
    ->name('clientes.pacotes.historico.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::get('', 'HistoricoPacotesController@index')->name('index');
        Route::get('dias', 'HistoricoPacotesController@dias')->name('dias');
        Route::get('pacotes', 'HistoricoPacotesController@pacotes')->name('pacotes');
    });
