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
