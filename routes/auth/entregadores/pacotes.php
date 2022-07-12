<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Pacotes')
    ->group(function () {
        Route::resource('pacote', 'PacotesController');
    });
