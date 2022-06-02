<?php

use Illuminate\Support\Facades\Route;

Route::name('clientes.')
    ->group(function () {
        Route::resource('notificacoes', 'NotificacoesController');
    });
