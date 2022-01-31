<?php

use Illuminate\Support\Facades\Route;

// Retorno de Autenticacao - URI de redirect
Route::get(
    'mercadolivre/autenticacao', 'App\Http\Controllers\Integracao\MercadoLivreController@retornoAutenticacao')
    ->name('mercadolivre.integracao.autenticacao');

// Recebimento de notificacao do Mercado Livre
Route::get(
    'mercadolivre/notificacao', 'App\Http\Controllers\Integracao\MercadoLivreController@getNotificacaoMeli')
    ->name('mercadolivre.integracao.notificacao');
