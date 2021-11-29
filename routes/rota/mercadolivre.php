<?php

use Illuminate\Support\Facades\Route;

// Todas as contas do usuario
Route::get(
    'mercadolivre/todas-contas', 'App\Http\Controllers\Integracao\MercadoLivreController@todasContas')
    ->name('mercadolivre.todas-contas');

 // Excluir Conta
Route::get(
    'mercadolivre/excluir-conta/{id}', 'App\Http\Controllers\Integracao\MercadoLivreController@delete')
    ->name('mercadolivre.excluir-conta');

// Pagina nova conta
Route::get(
    'mercadolivre/nova-conta', 'App\Http\Controllers\Integracao\MercadoLivreController@novaConta')
    ->name('mercadolivre.nova-conta');

// Retorno de Autenticacao - URI de redirect
Route::get(
    'mercadolivre/autenticacao', 'App\Http\Controllers\Integracao\MercadoLivreController@retornoAutenticacao')
    ->name('mercadolivre.integracao.autenticacao');

// Recebimento de notificacao do Mercado Livre
Route::get(
    'mercadolivre/notificacao', 'App\Http\Controllers\Integracao\MercadoLivreController@getNotificacaoMeli')
    ->name('mercadolivre.notificacao');

// TESTE
Route::get(
    'mercadolivre/teste', 'App\Http\Controllers\Integracao\MercadoLivreController@teste')
    ->name('mercadolivre.teste');
