<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Entregas')
    ->group(function () {
        Route::resource('entregas', 'EntregasController');

        Route::get('entrega/cancelar/{id}', 'EntregasController@cancel')
            ->name('entrega.cancelar');
    });
