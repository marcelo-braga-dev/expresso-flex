<?php

use Illuminate\Support\Facades\Route;

Route::prefix('integracoes')
    ->name('admins.integracoes.')
    ->namespace('Integracoes')
    ->group(function () {
        Route::resource('mercadolivre', 'MercadoLivreController');
    });
