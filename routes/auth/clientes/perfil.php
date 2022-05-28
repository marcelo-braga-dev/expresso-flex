<?php

use Illuminate\Support\Facades\Route;

Route::name('clientes.')
    ->namespace('Perfil')
    ->group(function () {
        Route::resource('perfil', 'PerfilController');
        Route::resource('senha', 'AlterarSenhaController');
    });
