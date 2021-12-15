<?php

use Illuminate\Support\Facades\Route;

/* --- CLientes --- */
// Home
Route::get(
    'home',
    'App\Http\Controllers\Admin\HomeController@index'
)->name('admin.home.index');

// Tabela de Clientes
Route::get(
    'usuarios/clientes',
    'App\Http\Controllers\Admin\Usuarios\ClientesController@index'
)->name('admin.usuarios.clientes.tabela');

// Informacoes do Cliente
Route::get(
    'usuarios/clientes/informacoes',
    'App\Http\Controllers\Admin\Usuarios\ClientesController@info'
)->name('admin.usuarios.clientes.info-clientes');

// Novo Cliente
Route::get(
    'usuarios/cliente/novo',
    function () {
        return view('pages.admin.usuarios.clientes.novo-cliente');
    }
)->name('admin.usuarios.clientes.new');

// Salvar Cliente
Route::put(
    'usuarios/clientes/salvar',
    'App\Http\Controllers\Admin\Usuarios\ClientesController@create'
)->name('admin.usuarios.clientes.create');

// Editar Cliente
Route::get(
    'usuarios/clientes/editar',
    'App\Http\Controllers\Admin\Usuarios\ClientesController@edit'
)->name('admin.usuarios.clientes.edit');

// Atualiza Cliente
Route::put(
    'usuarios/clientes/atualizar',
    'App\Http\Controllers\Admin\Usuarios\ClientesController@update'
)->name('admin.usuarios.clientes.update');


/* --- Conferentes --- */

// Tabela de Conferente
Route::get(
    'usuarios/conferentes',
    'App\Http\Controllers\Admin\Usuarios\ConferenteController@index'
)
    ->name('admin.usuarios.conferentes.tabela');

// Novo Conferente
Route::get(
    'usuarios/conferente/novo',
    function () {
        return view('pages.admin.usuarios.conferente.novo-conferente');
    }
)->name('admin.usuarios.conferente.new');

// Informacoes do Conferente
Route::get(
    'usuarios/conferente/informacoes',
    'App\Http\Controllers\Admin\Usuarios\ConferenteController@info'
)
    ->name('admin.usuarios.conferente.info');

// Criar Conferente
Route::put(
    'usuarios/conferente/salvar',
    'App\Http\Controllers\Admin\Usuarios\ConferenteController@create'
)->name('admin.usuarios.conferente.create');

// Editar Conferente
Route::get(
    'usuarios/conferente/editar',
    'App\Http\Controllers\Admin\Usuarios\ConferenteController@edit'
)->name('admin.usuarios.conferente.edit');

// Atualiza Conferente
Route::put(
    'usuarios/conferente/atualizar',
    'App\Http\Controllers\Admin\Usuarios\ConferenteController@update'
)->name('admin.usuarios.conferente.update');


/* --- ADMIN --- */

// Tabela de Admin
Route::get(
    'usuarios/admin',
    'App\Http\Controllers\Admin\Usuarios\AdminController@index'
)
    ->name('admin.usuarios.admin.tabela');

// Novo Admin
Route::get(
    'usuarios/admin/novo',
    function () {
        return view('pages.admin.usuarios.admin.novo-admin');
    }
)->name('admin.usuarios.admin.new');

// Informacoes do Admin
Route::get(
    'usuarios/admin/informacoes',
    'App\Http\Controllers\Admin\Usuarios\AdminController@info'
)
    ->name('admin.usuarios.admin.info');

// Criar Admin
Route::put(
    'usuarios/admin/salvar',
    'App\Http\Controllers\Admin\Usuarios\AdminController@create'
)->name('admin.usuarios.admin.create');

// Editar Admin
Route::get(
    'usuarios/admin/editar',
    'App\Http\Controllers\Admin\Usuarios\AdminController@edit'
)->name('admin.usuarios.admin.edit');

// Atualiza Conferente
Route::put(
    'usuarios/admin/atualizar',
    'App\Http\Controllers\Admin\Usuarios\AdminController@update'
)->name('admin.usuarios.admin.update');


/* --- Entregadores --- */

// Tabela de Entregador
Route::get(
    'usuarios/entregadores',
    'App\Http\Controllers\Admin\Usuarios\EntregadoresController@index'
)
    ->name('admin.usuarios.entregadores.tabela');

// Novo Conferente
Route::get(
    'usuarios/entregador/novo',
    function () {
        return view('pages.admin.usuarios.entregadores.novo-entregador');
    }
)->name('admin.usuarios.entregador.new');

// Informacoes do Conferente
Route::post(
    'usuarios/entregador/informacoes',
    'App\Http\Controllers\Admin\Usuarios\EntregadoresController@info'
)
    ->name('admin.usuarios.entregador.info');

// Criar Conferente
Route::put(
    'usuarios/entregador/salvar',
    'App\Http\Controllers\Admin\Usuarios\EntregadoresController@create'
)->name('admin.usuarios.entregador.create');

// Editar Conferente
Route::get(
    'usuarios/entregador/editar',
    'App\Http\Controllers\Admin\Usuarios\EntregadoresController@edit'
)->name('admin.usuarios.entregador.edit');

// Atualiza Conferente
Route::put(
    'usuarios/entregador/atualizar',
    'App\Http\Controllers\Admin\Usuarios\EntregadoresController@update'
)->name('admin.usuarios.entregador.update');


/*
 * Mercado Livre
 */
// Retorna pagina de dados da conta principal
Route::get(
    'mercadolivre/conta-sincronizada',
    'App\Http\Controllers\Admin\MercadoLivre\IntegracaoMeLiAdminController@contaPrincipal'
)->name('admin.mercadolivre.conta-sincronizada');

// Retorna pagina de dados da conta principal
Route::put(
    'mercadolivre/conta-sincronizada',
    'App\Http\Controllers\Admin\MercadoLivre\IntegracaoMeLiAdminController@update'
)->name('admin.mercadolivre.conta-sincronizada.update');

// Todas contas MeLi sincronizadas
Route::get(
    'mercadolivre/contas-sincronizadas',
    'App\Http\Controllers\Admin\MercadoLivre\ContasMercadoLivreController@todasContas'
)->name('admin.mercadolivre.contas-sincronizadas');

/*
 * Precos Fretes
 */
// tabela
Route::get(
    'fretes/tabela/{tipo}',
    'App\Http\Controllers\Admin\FretesController@tabela'
)->name('admin.fretes.tabela');
// formulario valores
Route::get(
    'fretes/atualiza-preco',
    'App\Http\Controllers\Admin\FretesController@editaPrecoClientes'
)->name('admin.fretes.atualiza-preco-clientes');
// update valores frete
Route::put(
    'fretes/atualiza-preco',
    'App\Http\Controllers\Admin\FretesController@atualizaPrecoClientes'
)->name('admin.fretes.atualiza-preco-clientes.put');

// entregadores



/*
 * Configuracoes
 */
// Pagina
Route::get(
    'config/config-geral',
    'App\Http\Controllers\Admin\ConfigController@geral'
)->name('admin.config.config-geral');
// rota 
Route::put(
    'config/config-geral',
    'App\Http\Controllers\Admin\ConfigController@update'
)->name('admin.config.config-geral.put');

/*
 * PACOTES
 */
Route::get(
    'pacotes/historico',
    'App\Http\Controllers\Admin\Pacotes\PacotesController@historico'
)->name('admin.pacotes.historico');

Route::get(
    'pacotes/historico-diario',
    'App\Http\Controllers\Admin\Pacotes\PacotesController@historicoDiario'
)->name('admin.pacotes.historico-diario');

Route::get(
    'pacotes/detalhes',
    'App\Http\Controllers\Admin\Pacotes\PacotesController@info'
)->name('admin.pacotes.detalhes');


/*
 * Coletas
 */
Route::get(
    'coletas/historico',
    'App\Http\Controllers\Admin\Coletas\ColetasController@historico'
)->name('admin.coletas.historico');

Route::get(
    'coletas/historico-diario',
    'App\Http\Controllers\Admin\Coletas\ColetasController@historicoDiario'
)->name('admin.coletas.historico-diario');

Route::get(
    'coletas/detalhes',
    'App\Http\Controllers\Admin\Coletas\ColetasController@info'
)->name('admin.coletas.detalhes');

//Config Coletas
Route::get(
    'coletas/config',
    'App\Http\Controllers\Admin\Coletas\ColetasController@config'
)->name('admin.coletas.config');

//Config Coletas
Route::put(
    'coletas/config',
    'App\Http\Controllers\Admin\Coletas\ColetasController@update'
)->name('admin.coletas.config-update');


/*
 * Financeiro
 */
/*  Conta Mercado Pago */
Route::get(
    'financeiro/conta-mercadopago',
    'App\Http\Controllers\Admin\Financeiro\MercadoPagoController@index'
)->name('admin.financeiro.conta-mercadopago');

Route::put(
    'financeiro/conta-mercadopago',
    'App\Http\Controllers\Admin\Financeiro\MercadoPagoController@update'
)->name('admin.financeiro.conta-mercadopago.put');

/*  Clientes Financeiro */

// todos clientes
Route::get(
    'financeiro/clientes',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@index'
)->name('admin.financeiro.cliente');
// historico mes
Route::get(
    'financeiro/cliente',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@historicoMes'
)->name('admin.financeiro.cliente-mes');

// historico quinzena
Route::get(
    'financeiro/cliente/quinzena',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@historicoQuinzena'
)->name('admin.financeiro.cliente.quinzena');


// historico mes
Route::get(
    'financeiro/cliente/detalhes-mensal',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@historicoDetalhesMes'
)->name('admin.financeiro.cliente.detalhes-mensal');

// Realizar pagamento direto
Route::put(
    'financeiro/cliente/pagamento-direto',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@pagamentoDinheiro'
)->name('admin.financeiro.cliente.pagamento-dinheiro');

/* Entregadores Financeiro */
// Historico Todos entregadores
Route::get(
    'financeiro/entregadores',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@index'
)->name('admin.financeiro.entregadores');

// historico mes
Route::get(
    'financeiro/entregador',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@historicoMes'
)->name('admin.financeiro.entregador-mes');

// historico quinzena
Route::get(
    'financeiro/entregador/quinzena',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@historicoQuinzena'
)->name('admin.financeiro.entregador.quinzena');

// detalhes-mensal
Route::get(
    'financeiro/entregador/detalhes-mensal',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@historicoDetalhesMes'
)->name('admin.financeiro.entregador.detalhes-mensal');

// Realizar pagamento direto
Route::put(
    'financeiro/entregador/pagamento-direto',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@pagamentoDinheiro'
)->name('admin.financeiro.entregador.pagamento-dinheiro');

/* AJAX */

//atualiza status usuario 
Route::get(
    'ajax/usuario/atualiza-status-usuario/',
    'App\Http\Controllers\Admin\Usuarios\UsuariosController@modificaStatusUsuario'
)->name('ajax.admin.usuario.atualiza-status-usuario');
