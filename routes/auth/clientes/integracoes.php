<?php

use Illuminate\Support\Facades\Route;

Route::prefix('integracoes')
    ->name('clientes.integracoes.')
    ->namespace('Integracoes')
    ->group(function () {
        Route::get('mercadolivre', 'MercadoLivreController@index')->name('mercadolivre.index');
    });
