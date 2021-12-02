<?php
// Home
Route::get('home', 'App\Http\Controllers\Conferente\HomeConferenteController@index')
    ->name('conferente.home.index');

// Pagina para fazer checkin na base
Route::get('checkin/pacotes', 'App\Http\Controllers\Pacotes\ConferenteController@checkinColetas')
    ->name('conferente.checkin.pacotes');

// Pagina pacotes da base
Route::get('checkin/pacotes-base', 'App\Http\Controllers\Pacotes\ConferenteController@pacotesBase')
    ->name('conferente.checkin.pacotes-base');

// Mostra as informacoes do pacote para checkin
Route::put('checkin/info-checkin', 'App\Http\Controllers\Pacotes\ConferenteController@infoCheckin')
    ->name('conferente.checkin.info-checkin');

Route::get('checkin/info-checkin', 'App\Http\Controllers\Pacotes\ConferenteController@infoCheckin')
    ->name('conferente.checkin.info-checkin');

// Mostra as informacoes do pacote para checkin
Route::put('checkin/confirmar-checkin', 'App\Http\Controllers\Pacotes\ConferenteController@confimarCheckin')
    ->name('conferente.checkin.confirmar-checkin');

/* Status Pacotes */
// Mostra pacotes que estao na base
Route::get('pacotes/pacotes-base', 'App\Http\Controllers\Conferente\StatusPacotes\PacotesNaBaseController@index')
    ->name('conferente.pacotes.pacotes-base');

// Mostra pacotes sob Coleta
Route::get('pacotes/pacotes-sob-coleta', 'App\Http\Controllers\Conferente\StatusPacotes\PacotesSobColetaController@index')
    ->name('conferente.pacotes.pacotes-sob-coleta');

// Mostra pacotes sob entrega
Route::get('pacotes/pacotes-sob-entrega', 'App\Http\Controllers\Conferente\StatusPacotes\PacotesSobEntregaController@index')
    ->name('conferente.pacotes.pacotes-sob-entrega');

/*
 * Historico Pacotes
 */ 
// Mostra historico de pacotes
Route::get('pacotes/historico', 'App\Http\Controllers\Conferente\HistoricoPacotesController@index')
    ->name('conferente.pacotes.historico');

// Mostra historico de pacotes diario
Route::get('pacotes/historico-diario', 'App\Http\Controllers\Conferente\HistoricoPacotesController@historicoDiario')
    ->name('conferente.pacotes.historico-diario');

// Mostra infomacoes de pacotes
Route::get('pacotes/detalhes', 'App\Http\Controllers\Conferente\HistoricoPacotesController@info')
    ->name('conferente.pacotes.info');


/*
 * Historico Coletas
 */ 
// Mostra historico de coletas
Route::get('coletas/historico', 'App\Http\Controllers\Conferente\HistoricoPacotesController@index')
    ->name('conferente.coletas.historico');

// Mostra historico de coletas diario
Route::get('coletas/historico-diario', 'App\Http\Controllers\Conferente\HistoricoPacotesController@historicoDiario')
    ->name('conferente.coletas.historico-diario');

// Mostra infomacoes de coletas
Route::get('coletas/detalhes', 'App\Http\Controllers\Conferente\HistoricoPacotesController@info')
    ->name('conferente.coletas.info');

/*
 * Historico Solicitacoes
 */ 
// Mostra historico de solicitacoes
Route::get('solicitacoes/historico', 'App\Http\Controllers\Conferente\Historico\ColetasController@index')
    ->name('conferente.solicitacoes.historico');

// Mostra historico de solicitacoes diario
Route::get('solicitacoes/historico-diario', 'App\Http\Controllers\Conferente\Historico\ColetasController@historicoDiario')
    ->name('conferente.solicitacoes.historico-diario');

// Mostra infomacoes de solicitacoes
Route::get('solicitacoes/detalhes', 'App\Http\Controllers\Conferente\Historico\ColetasController@info')
    ->name('conferente.solicitacoes.info');


/*  */
// Chekout Entregadores
Route::get('entregadores/pacotes-entregar', 'App\Http\Controllers\Conferente\Checkout\EntregadoresCheckoutController@index')
    ->name('conferente.entregadores.pacotes-entregar');
// Info Chekout Entregadores
Route::get('entregadores/info-pacotes-entregar', 'App\Http\Controllers\Conferente\Checkout\EntregadoresCheckoutController@info')
    ->name('conferente.entregadores.info-pacotes-entregar');

// Alterar Entregador do Pacote
Route::put('pacotes/alterar-entregador', 'App\Http\Controllers\Conferente\StatusPacotes\PacotesNaBaseController@alterarEntregador')
    ->name('conferente.pacotes.alterar-entregador');
