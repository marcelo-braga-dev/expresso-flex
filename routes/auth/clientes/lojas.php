<?php

use Illuminate\Support\Facades\Route;

Route::prefix('lojas')
    ->name('clientes.lojas.')
    ->namespace('Coletas')
    ->group(function () {
        Route::get('', 'LojasController@index')->name('index');
        Route::get('create', 'LojasController@create')->name('create');
        Route::post('store', 'LojasController@store')->name('store');
        Route::put('delete', 'LojasController@delete')->name('delete');
        Route::get('qrcode','QrCodeLojasController@index')->name('qrcode');
    });
