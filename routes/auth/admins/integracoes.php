<?php

use Illuminate\Support\Facades\Route;

Route::prefix('integracoes-admin')
    ->name('admins.integracoes.admins.')
    ->namespace('Integracoes\Admins')
    ->group(function () {
        Route::resource('mercadolivre', 'MercadoLivreController');
        Route::resource('mercadopago', 'MercadoPagoController');
    });

Route::prefix('integracoes-clientes')
    ->name('admins.integracoes.clientes.')
    ->namespace('Integracoes\Clientes')
    ->group(function () {
        Route::resource('mercadolivre', 'MercadoLivreController');
        Route::put('mercadolivre-atualizar-todos', 'MercadoLivreController@atualizarTodos')
            ->name('atualizarTodos');
    });


