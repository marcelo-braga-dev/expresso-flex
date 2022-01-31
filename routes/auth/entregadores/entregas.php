<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Entregas')
    ->group(function () {
        Route::resource('entregas', 'EntregasController');
    });
