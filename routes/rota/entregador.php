<?php

include_once 'entregador/pacotes.php';

// Home
Route::get('home', 'App\Http\Controllers\Entregadores\HomeEntregadoresController@index')
    ->name('entregador.home.index');

Route::get('pesquisar-pacote', 'App\Http\Controllers\Entregadores\HomeEntregadoresController@pesquisarPacote')
    ->name('entregador.pesquisar-pacote');

/*
 * Coletas
 */

// PAGINA COLETA PRINCIPAL EM USO
Route::get('coleta/todas-coletas', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@index')
    ->name('entregadores.coletas.todas-coletas');

// Aceitar Coleta
Route::put('coleta/aceitar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@aceitarColeta')
    ->name('entregadores.coletas.aceitar-coleta');

// Criar Coleta
Route::get('coleta/criar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@criarColeta')
    ->name('entregadores.coletas.criar-coleta');

Route::put('coleta/criar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@salvarNovaColeta')
    ->name('entregadores.coletas.criar-coleta.put');

// Coletas Cancelar
Route::put('coleta/cancelar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@cancelarColeta')
    ->name('entregadores.coletas.cancelar-coleta');

// Finaliza Status
Route::put('coleta/alterar-status', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@alterarStatus')
    ->name('entregadores.coleta.alterar-status');








// Historico
Route::get(
    'coleta/historico-coleta',
    'App\Http\Controllers\Entregadores\Coleta\HistoricoController@historico'
)->name('entregadores.coletas.historico-coleta');

// Historico Dia
Route::get(
    'coleta/historico-coleta-dia',
    'App\Http\Controllers\Entregadores\Coleta\HistoricoController@historicoDia'
)->name('entregadores.coletas.historico-coleta-dia');

// Historico Info
Route::get(
    'coletas/detalhes',
    'App\Http\Controllers\Entregadores\Coleta\HistoricoController@info'
)->name('entregadores.coletas.info');

/*
 * ENTREGAS
 */

// Pagina Cadastrar Pacotes
Route::get(
    'entrega/cadastrar-pacotes',
    'App\Http\Controllers\Entregadores\Entregas\CadastrarPacotesController@index'
)->name('entregadores.entrega.cadastrar-pacotes');
// Rota Cadastrar Pacote
Route::put(
    'entrega/cadastrar-pacotes',
    'App\Http\Controllers\Entregadores\Entregas\CadastrarPacotesController@update'
)->name('entregadores.entrega.cadastrar-pacotes.put');
// Rota Cadastrar Pacote
Route::get(
    'entrega/cadastrar-pacotes/qr-code',
    'App\Http\Controllers\Entregadores\Entregas\CadastrarPacotesController@update'
)->name('entregadores.entrega.cadastrar-pacotes.qr-code');


// Entregas Iniciada
Route::get(
    'entrega/para-entregar',
    'App\Http\Controllers\Entregadores\Entregas\IniciadoEntregaController@info'
)->name('entregadores.entrega.para-entregar');

Route::get(
    'entrega/entregas-iniciadas',
    'App\Http\Controllers\Entregadores\Entregas\IniciadoEntregaController@index'
)->name('entregadores.entrega.entrega-iniciadas'); // OK

Route::put(
    'entrega/entregas-iniciadas',
    'App\Http\Controllers\Entregadores\Entregas\IniciadoEntregaController@update'
)->name('entregadores.entrega.entrega-iniciadas.put');


// Entrega em Andamento
Route::get(
    'entrega/em-andamento',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@info'
)->name('entregadores.entrega.em-andamento');

// Route::post(
//     'entrega/em-andamento',
//     'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@info'
// )->name('entregadores.entrega.em-andamento');
// QRCode
Route::get(
    'entrega/em-andamento/qr-code',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@infoQrCode'
)->name('entregadores.entrega.em-andamento.info.qr-code');

Route::put(
    'entrega/em-andamento',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@update'
)->name('entregadores.entrega.em-andamento.put');


// Rota Finaliza Entrega
Route::put(
    'entrega/finalizar-entrega',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@update'
)->name('entregadores.entrega.finaliza');

// Entregas Finalizadas
Route::get(
    'entrega/entregas-finalizadas',
    'App\Http\Controllers\Entregadores\Entregas\FinalizadaEntregasController@index'
)->name('entregadores.entrega.entregas-finalizadas');

/*
 * PACOTES
 */







// Cancela Entrega
Route::get(
    'entrega/cancelar-entrega',
    'App\Http\Controllers\Entregadores\EntregaController@cancel'
)->name('entregadores.entrega.cancelar-entrega');

// Cancelar Entrega
Route::put(
    'entrega/atualizar-cancelar-entrega',
    'App\Http\Controllers\Entregadores\EntregaController@cancelStore'
)->name('entregadores.entrega.atualizar-cancelar-entrega');

/*
 * Financeiro
 */
Route::get(
    'financeiro/receber',
    'App\Http\Controllers\Entregadores\FinanceiroController@receber'
)->name('entregadores.financeiro.receber');

Route::get(
    'financeiro/receber/detalhes',
    'App\Http\Controllers\Entregadores\FinanceiroController@detalhesMensal'
)->name('entregadores.financeiro.receber.detalhes');
