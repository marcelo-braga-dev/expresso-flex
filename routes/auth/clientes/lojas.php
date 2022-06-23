<?php

use Illuminate\Support\Facades\Route;

Route::name('clientes.')
    ->namespace('Coletas')
    ->group(function () {
        Route::resource('lojas', 'LojasController');
        Route::get('lojas-qrcode','QrCodeLojasController@index')->name('lojas.qrcode');
    });
