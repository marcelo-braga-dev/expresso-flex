<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.')
    ->namespace('Perfil')
    ->group(function () {
        Route::resource('perfil', 'PerfilController');
    });
