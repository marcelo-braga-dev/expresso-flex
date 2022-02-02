<?php

use Illuminate\Support\Facades\Route;

Route::prefix('usuarios')
    ->name('admins.usuarios.')
    ->namespace('Usuarios')
    ->group(function () {
        Route::resource('clientes', 'ClientesController');
    });
