<?php

/**
 * Home
 */
// Index
Route::get('home', 'HomeClienteController@index')
    ->name('cliente.home.index');

/**
 * Coletas
 */

// Solicitar Coleta
Route::get('coleta/solicitar-coleta', 'ColetaController@solicitarColeta')
    ->name('cliente.coleta.solicitar-coleta');

Route::put('coleta/solicitar-coleta', 'ColetaController@store')
    ->name('cliente.coleta.solicitar-coleta.put');

// Cancelar Coleta
Route::put('coleta/cancelar-coleta', 'ColetaController@cancelarColeta')
    ->name('cliente.coleta.cancelar-coleta');


/*
 * Pacotes
 */
//      Historico Mes Pacotes
Route::get('pacotes/historico', 'PacotesControllers@historicoMes')
    ->name('cliente.pacotes.historico');

//      Historico Pacotes
Route::get('pacotes/historico-diario', 'PacotesControllers@historicoDia')
    ->name('cliente.pacotes.historico-diario');

//      Historico Pacotes
Route::get('pacotes/historico-diario-detalhes', 'PacotesControllers@historicoDetalhesDia')
    ->name('cliente.pacotes.historico-diario-detalhes');

//      Info Pacote
Route::get('pacotes/descricao', 'PacotesControllers@info')
    ->name('cliente.pacotes.info-pacote');

//      Pesquisar Pacote
Route::get('pacotes/pesquisar', 'PacotesControllers@pesquisar')
    ->name('cliente.pacotes.pesquisar');


/*
 * Etiqueta
 */

// Pagina Nova Etiqueta
Route::get('etiqueta/emitir-etiqueta', 'EtiquetasClienteController@new')
    ->name('cliente.etiqueta.emitir-etiqueta');

// TotaCriar Etiqueta
Route::put('etiqueta/criar-etiqueta', 'EtiquetasClienteController@store')
    ->name('cliente.etiqueta.criar-etiqueta');

// Todas Etiqueta
Route::get('etiqueta/todas-etiquetas', 'EtiquetasClienteController@index')
    ->name('cliente.etiqueta.todas-etiquetas');

// Imprimir Etiqueta
Route::post('etiqueta/imprimir-etiqueta', 'EtiquetasClienteController@imprimir')
    ->name('cliente.etiqueta.imprimir-etiqueta');

/*
 * Financeiro
 */
Route::get(
    'financeiro/pagamentos',
    'FinanceiroController@pagamentos'
)->name('cliente.financeiro.pagamentos');

// historico quinzena
Route::get(
    'financeiro/quinzena',
    'FinanceiroController@historicoQuinzena'
)->name('cliente.financeiro.quinzena');

Route::get(
    'financeiro/pagamentos/detalhes-mensal',
    'FinanceiroController@detalhesMensal'
)->name('cliente.financeiro.pagamentos.detalhes-mensal');


/*
 * Perfil
 */
// Edita Perfil
Route::get(
    'perfil/editar',
    'PerfilController@edit'
)->name('cliente.perfil.editar');

// Update Perfil
Route::put(
    'perfil/update',
    'PerfilController@update'
)->name('cliente.perfil.update');



/*
 * Mercado Livre
 */
// Todas as contas do usuario
Route::get(
    'mercadolivre/todas-contas',
    'MercadoLivreController@todasContas'
)->name('mercadolivre.todas-contas');

// Excluir Conta
Route::get(
    'mercadolivre/excluir-conta/{id}',
    'MercadoLivreController@delete'
)->name('mercadolivre.excluir-conta');

