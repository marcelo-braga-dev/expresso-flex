<?php

use Illuminate\Support\Facades\Route;

Route::name('entregadores.perfil.')
    ->namespace('Perfil')
    ->group(function () {
        Route::resource('usuario', 'PerfilController');
        Route::resource('alterar-senha', 'AlterarSenhaController');
    });
