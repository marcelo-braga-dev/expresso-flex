<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.historicos.')
    ->namespace('Historicos')
    ->controller('EntregasFinalizadasController')
    ->group(function () {
        Route::get('entregas-finalizadas', 'EntregasFinalizadasController@index')
            ->name('entregas-finalizadas.index');
    });
