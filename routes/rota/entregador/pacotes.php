<?php
// Página de Cadastro de Pacote
use Illuminate\Support\Facades\Route;

//Route::get('coleta/{idColeta}/cadastrar-pacotes', 'App\Http\Controllers\Pacotes\EntregadorPacotesController@cadastrarPacotes')
//    ->name('entregadores.pacotes.cadastrar-pacotes');

// Rota para cadastrar novo pacote
Route::put('coleta/salvar-pacote', 'App\Http\Controllers\Pacotes\EntregadorPacotesController@create')
    ->name('entregadores.pacotes.salvar-pacote.put');
//QR Code
Route::get('coleta/salvar-pacote', 'App\Http\Controllers\Pacotes\EntregadorPacotesController@create')
    ->name('entregadores.pacotes.salvar-pacote');

//historiico completo
Route::get(
    'pacotes/historico',
    'App\Http\Controllers\Pacotes\EntregadorPacotesController@historico'
)->name('entregadores.pacotes.historico');

//historiico diario
Route::get(
    'pacotes/historico-diario',
    'App\Http\Controllers\Pacotes\EntregadorPacotesController@historicoDia'
)->name('entregadores.pacotes.historico-dia');


Route::get(
    'pacotes/detalhes',
    'App\Http\Controllers\Pacotes\EntregadorPacotesController@info'
)->name('entregadores.pacotes.info');
