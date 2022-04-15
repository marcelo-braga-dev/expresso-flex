<?php

use Illuminate\Support\Facades\Route;

Route::prefix('importacao')
    ->name('clientes.importacoes.')
    ->namespace('ImportacaoPacotes')
    ->group(function () {
        Route::resource('mercadolivre', 'MercadoLivreController');
        Route::resource('pacotes', 'ImportacoesController');
    });
