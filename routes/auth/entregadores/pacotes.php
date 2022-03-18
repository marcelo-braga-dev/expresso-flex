<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Pacotes')
    ->group(function () {

        Route::get('pacotes/historico', 'HistoricoController@historico')
            ->name('pacotes.historico');

        Route::get('pacotes/historico-diario', 'HistoricoController@historicoDia')
            ->name('pacotes.historico-dia');
    });

Route::get(
    'pacotes/detalhes',
    'App\Http\Controllers\Pacotes\EntregadorPacotesController@info'
)->name('entregadores.pacotes.info');
