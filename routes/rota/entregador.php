<?php
// Home
Route::get('entregador/home', 'App\Http\Controllers\Entregadores\HomeEntregadoresController@index')
    ->name('entregador.home.index');

Route::get('entregador/pesquisar-pacote', 'App\Http\Controllers\Entregadores\HomeEntregadoresController@pesquisarPacote')
    ->name('entregador.pesquisar-pacote');

/*
 * Coletas
 */

// PAGONA COLETA PRINCIPAL EM USO
Route::get('entregadores/coleta/todas-coletas', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@index')
    ->name('entregadores.coletas.todas-coletas');

// Aceitar Coleta
Route::put('entregadores/coleta/aceitar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@aceitarColeta')
    ->name('entregadores.coletas.aceitar-coleta');

// Criar Coleta
Route::get('entregadores/coleta/criar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@criarColeta')
    ->name('entregadores.coletas.criar-coleta');

Route::put('entregadores/coleta/criar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@salvarNovaColeta')
    ->name('entregadores.coletas.criar-coleta');


// Coletas Disponiveis EXTINTO
// Route::get('entregadores/coleta/coletas-disponiveis', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@coletasDisponiveis')
//     ->name('entregadores.coletas.coletas-disponiveis');

// Coletas Aceitas EXTINTO
// Route::get('entregadores/coleta/coletas-aceitas', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@coletasAceitas')
//     ->name('entregadores.coletas.coletas-aceitas');

// Coletas Cancelar
Route::put('entregadores/coleta/cancelar-coleta', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@cancelarColeta')
    ->name('entregadores.coletas.cancelar-coleta');

// Finaliza Status
Route::put('entregadores/coleta/alterar-status', 'App\Http\Controllers\Entregadores\Coleta\ColetasController@alterarStatus')
    ->name('entregadores.coleta.alterar-status');

// Página de Cadastro de Pacote
Route::get('entregadores/coleta/{idColeta}/cadastrar-pacotes', 'App\Http\Controllers\Pacotes\EntregadorPacotesController@cadastrarPacotes')
    ->name('entregadores.pacotes.cadastrar-pacotes');

// Rota para cadastrar novo pacote
Route::put('entregadores/coleta/salvar-pacote', 'App\Http\Controllers\Pacotes\EntregadorPacotesController@create')
    ->name('entregadores.pacotes.salvar-pacote');
//QR Code
Route::get('entregadores/coleta/salvar-pacote', 'App\Http\Controllers\Pacotes\EntregadorPacotesController@create')
    ->name('entregadores.pacotes.salvar-pacote');






// Historico
Route::get(
    'entregadores/coleta/historico-coleta',
    'App\Http\Controllers\Entregadores\Coleta\HistoricoController@historico'
)->name('entregadores.coletas.historico-coleta');

// Historico Dia
Route::get(
    'entregadores/coleta/historico-coleta-dia',
    'App\Http\Controllers\Entregadores\Coleta\HistoricoController@historicoDia'
)->name('entregadores.coletas.historico-coleta-dia');

// Historico Info 
Route::get(
    'entregadores/coletas/detalhes',
    'App\Http\Controllers\Entregadores\Coleta\HistoricoController@info'
)->name('entregadores.coletas.info');

/* 
 * ENTREGAS 
 */

// Pagina Cadastrar Pacotes
Route::get(
    'entregadores/entrega/cadastrar-pacotes',
    'App\Http\Controllers\Entregadores\Entregas\CadastrarPacotesController@index'
)->name('entregadores.entrega.cadastrar-pacotes');
// Rota Cadastrar Pacote
Route::put(
    'entregadores/entrega/cadastrar-pacotes',
    'App\Http\Controllers\Entregadores\Entregas\CadastrarPacotesController@update'
)->name('entregadores.entrega.cadastrar-pacotes');
// Rota Cadastrar Pacote
Route::get(
    'entregadores/entrega/cadastrar-pacotes/qr-code',
    'App\Http\Controllers\Entregadores\Entregas\CadastrarPacotesController@update'
)->name('entregadores.entrega.cadastrar-pacotes.qr-code');


// Entregas Iniciada
Route::get(
    'entregadores/entrega/para-entregar',
    'App\Http\Controllers\Entregadores\Entregas\IniciadoEntregaController@info'
)->name('entregadores.entrega.para-entregar');

Route::get(
    'entregadores/entrega/entregas-iniciadas',
    'App\Http\Controllers\Entregadores\Entregas\IniciadoEntregaController@index'
)->name('entregadores.entrega.entrega-iniciadas'); // OK

Route::put(
    'entregadores/entrega/entregas-iniciadas',
    'App\Http\Controllers\Entregadores\Entregas\IniciadoEntregaController@update'
)->name('entregadores.entrega.entrega-iniciadas');


// Entrega em Andamento
Route::get(
    'entregadores/entrega/em-andamento',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@info'
)->name('entregadores.entrega.em-andamento');

// Route::post(
//     'entregadores/entrega/em-andamento',
//     'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@info'
// )->name('entregadores.entrega.em-andamento');
// QRCode
Route::get(
    'entregadores/entrega/em-andamento/qr-code',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@infoQrCode'
)->name('entregadores.entrega.em-andamento.info.qr-code');

Route::put(
    'entregadores/entrega/em-andamento',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@update'
)->name('entregadores.entrega.em-andamento');


// Rota Finaliza Entrega
Route::put(
    'entregadores/entrega/finalizar-entrega',
    'App\Http\Controllers\Entregadores\Entregas\AndamentoEntregasController@update'
)->name('entregadores.entrega.finaliza');

// Entregas Finalizadas 
Route::get(
    'entregadores/entrega/entregas-finalizadas',
    'App\Http\Controllers\Entregadores\Entregas\FinalizadaEntregasController@index'
)->name('entregadores.entrega.entregas-finalizadas');

/*
 * PACOTES
 */

//historiico completo
Route::get(
    'entregadores/pacotes/historico',
    'App\Http\Controllers\Pacotes\EntregadorPacotesController@historico'
)->name('entregadores.pacotes.historico');

//historiico diario
Route::get(
    'entregadores/pacotes/historico-diario',
    'App\Http\Controllers\Pacotes\EntregadorPacotesController@historicoDia'
)->name('entregadores.pacotes.historico-dia');


Route::get(
    'entregadores/pacotes/detalhes',
    'App\Http\Controllers\Pacotes\EntregadorPacotesController@info'
)->name('entregadores.pacotes.info');





// Cancela Entrega
Route::get(
    'entregadores/entrega/cancelar-entrega',
    'App\Http\Controllers\Entregadores\EntregaController@cancel'
)->name('entregadores.entrega.cancelar-entrega');

// Cancelar Entrega
Route::put(
    'entregadores/entrega/atualizar-cancelar-entrega',
    'App\Http\Controllers\Entregadores\EntregaController@cancelStore'
)->name('entregadores.entrega.atualizar-cancelar-entrega');

/*
 * Financeiro
 */
Route::get(
    'entregadores/financeiro/receber',
    'App\Http\Controllers\Entregadores\FinanceiroController@receber'
)->name('entregadores.financeiro.receber');

Route::get(
    'entregadores/financeiro/receber/detalhes',
    'App\Http\Controllers\Entregadores\FinanceiroController@detalhesMensal'
)->name('entregadores.financeiro.receber.detalhes');
