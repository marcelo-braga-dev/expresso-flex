<?php

use Illuminate\Support\Facades\Route;

Route::prefix('usuarios')
    ->name('admins.usuarios.')
    ->namespace('Usuarios')
    ->group(function () {
        Route::resource('admins', 'AdminsController');
        Route::resource('clientes', 'ClientesController');
        Route::resource('entregadores', 'EntregadoresController');
        Route::resource('conferentes', 'ConferentesController');

        Route::get('ajax/usuario/atualiza-status-usuario/', 'UsuariosController@modificaStatusUsuario')
            ->name('atualiza-status-usuario');
    });
