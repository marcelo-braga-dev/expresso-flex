<?php

/**
 * Coletas
 */

// Solicitar Coleta
Route::get('cliente/coleta/solicitar-coleta', 'App\Http\Controllers\Cliente\ColetaController@solicitarColeta')
    ->name('cliente.coleta.solicitar-coleta');

Route::put('cliente/coleta/solicitar-coleta', 'App\Http\Controllers\Cliente\ColetaController@store')
    ->name('cliente.coleta.solicitar-coleta');

// Cancelar Coleta
Route::put('cliente/coleta/cancelar-coleta', 'App\Http\Controllers\Cliente\ColetaController@cancelarColeta')
    ->name('cliente.coleta.cancelar-coleta');

// Historico de Coleta (meses)
Route::get('cliente/coleta/historico', 'App\Http\Controllers\Cliente\Coletas\HistoricoController@historicoMeses')
    ->name('cliente.coleta.historico-coleta');
// Historico de Coleta (dias)
Route::get('cliente/coleta/historico/dias', 'App\Http\Controllers\Cliente\Coletas\HistoricoController@historicoDias')
    ->name('cliente.coleta.historico.dias');

// Pontos de Coleta
Route::get('cliente/pontos-de-coleta', 'App\Http\Controllers\Cliente\LojasController@todasLojas')
    ->name('cliente.coleta.pontos-de-coleta');
Route::put('cliente/pontos-de-coleta', 'App\Http\Controllers\Cliente\LojasController@novaLoja')
    ->name('cliente.coleta.pontos-de-coleta');

//Desativar Loja    
Route::put('cliente/pontos-de-coleta/desativar', 'App\Http\Controllers\Cliente\LojasController@desativar')
    ->name('cliente.coleta.pontos-de-coleta.desativar');

/*
 * Pacotes
 */
//      Historico Mes Pacotes
Route::get('cliente/pacotes/historico', 'App\Http\Controllers\Cliente\PacotesControllers@historicoMes')
    ->name('cliente.pacotes.historico');

//      Historico Pacotes
Route::get('cliente/pacotes/historico-diario', 'App\Http\Controllers\Cliente\PacotesControllers@historicoDia')
    ->name('cliente.pacotes.historico-diario');

//      Historico Pacotes
Route::get('cliente/pacotes/historico-diario-detalhes', 'App\Http\Controllers\Cliente\PacotesControllers@historicoDetalhesDia')
    ->name('cliente.pacotes.historico-diario-detalhes');

//      Info Pacote
Route::get('cliente/pacotes/descricao', 'App\Http\Controllers\Cliente\PacotesControllers@info')
    ->name('cliente.pacotes.info-pacote');

    //      Pesquisar Pacote
Route::get('cliente/pacotes/pesquisar', 'App\Http\Controllers\Cliente\PacotesControllers@pesquisar')
    ->name('cliente.pacotes.pesquisar');

/**
 * Home
 */
// Index
Route::get('cliente/home/', 'App\Http\Controllers\Cliente\HomeClienteController@index')
    ->name('cliente.home.index');

/*
 * Etiqueta
 */

// Pagina Nova Etiqueta
Route::get('cliente/etiqueta/emitir-etiqueta', 'App\Http\Controllers\Cliente\EtiquetasClienteController@new')
    ->name('cliente.etiqueta.emitir-etiqueta');

// TotaCriar Etiqueta
Route::put('cliente/etiqueta/criar-etiqueta', 'App\Http\Controllers\Cliente\EtiquetasClienteController@store')
    ->name('cliente.etiqueta.criar-etiqueta');

// Todas Etiqueta
Route::get('cliente/etiqueta/todas-etiquetas', 'App\Http\Controllers\Cliente\EtiquetasClienteController@index')
    ->name('cliente.etiqueta.todas-etiquetas');

// Imprimir Etiqueta
Route::post('cliente/etiqueta/imprimir-etiqueta', 'App\Http\Controllers\Cliente\EtiquetasClienteController@imprimir')
    ->name('cliente.etiqueta.imprimir-etiqueta');

/*
 * Financeiro
 */
Route::get(
    'cliente/financeiro/pagamentos',
    'App\Http\Controllers\Cliente\FinanceiroController@pagamentos'
)->name('cliente.financeiro.pagamentos');

Route::get(
    'cliente/financeiro/pagamentos/detalhes-mensal',
    'App\Http\Controllers\Cliente\FinanceiroController@detalhesMensal'
)->name('cliente.financeiro.pagamentos.detalhes-mensal');

/*
 * Perfil
 */
Route::get(
    'cliente/perfil/qrcode-usuario',
    'App\Http\Controllers\Cliente\PerfilController@getQrcodeUsuario'
)->name('cliente.perfil.qrcode-usuario');
