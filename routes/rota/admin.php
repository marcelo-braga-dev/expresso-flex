<?php

use Illuminate\Support\Facades\Route;

/* --- Conferentes --- */

// Tabela de Clientes
Route::get(
    'usuarios/clientes',
    'App\Http\Controllers\Usuarios\ClientesController@index'
)
    ->name('admin.usuarios.clientes.tabela');

// Informacoes do Cliente
Route::get(
    'usuarios/clientes/informacoes',
    'App\Http\Controllers\Usuarios\ClientesController@info'
)
    ->name('admin.usuarios.clientes.info-clientes');

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
    'App\Http\Controllers\Usuarios\ClientesController@create'
)->name('admin.usuarios.clientes.create');

// Editar Cliente
Route::get(
    'usuarios/clientes/editar',
    'App\Http\Controllers\Usuarios\ClientesController@edit'
)->name('admin.usuarios.clientes.edit');

// Atualiza Cliente
Route::put(
    'usuarios/clientes/atualizar',
    'App\Http\Controllers\Usuarios\ClientesController@update'
)->name('admin.usuarios.clientes.update');


/* --- Conferentes --- */

// Tabela de Conferente
Route::get(
    'usuarios/conferentes',
    'App\Http\Controllers\Usuarios\ConferenteController@index'
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
    'App\Http\Controllers\Usuarios\ConferenteController@info'
)
    ->name('admin.usuarios.conferente.info');

// Criar Conferente
Route::put(
    'usuarios/conferente/salvar',
    'App\Http\Controllers\Usuarios\ConferenteController@create'
)->name('admin.usuarios.conferente.create');

// Editar Conferente
Route::get(
    'usuarios/conferente/editar',
    'App\Http\Controllers\Usuarios\ConferenteController@edit'
)->name('admin.usuarios.conferente.edit');

// Atualiza Conferente
Route::put(
    'usuarios/conferente/atualizar',
    'App\Http\Controllers\Usuarios\ConferenteController@update'
)->name('admin.usuarios.conferente.update');


/* --- ADMIN --- */

// Tabela de Admin
Route::get(
    'usuarios/admin',
    'App\Http\Controllers\Usuarios\AdminController@index'
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
    'App\Http\Controllers\Usuarios\AdminController@info'
)
    ->name('admin.usuarios.admin.info');

// Criar Admin
Route::put(
    'usuarios/admin/salvar',
    'App\Http\Controllers\Usuarios\AdminController@create'
)->name('admin.usuarios.admin.create');

// Editar Admin
Route::get(
    'usuarios/admin/editar',
    'App\Http\Controllers\Usuarios\AdminController@edit'
)->name('admin.usuarios.admin.edit');

// Atualiza Conferente
Route::put(
    'usuarios/admin/atualizar',
    'App\Http\Controllers\Usuarios\AdminController@update'
)->name('admin.usuarios.admin.update');


/* --- Entregadores --- */

// Tabela de Entregador
Route::get(
    'usuarios/entregadores',
    'App\Http\Controllers\Usuarios\EntregadoresController@index'
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
    'App\Http\Controllers\Usuarios\EntregadoresController@info'
)
    ->name('admin.usuarios.entregador.info');

// Criar Conferente
Route::put(
    'usuarios/entregador/salvar',
    'App\Http\Controllers\Usuarios\EntregadoresController@create'
)->name('admin.usuarios.entregador.create');

// Editar Conferente
Route::get(
    'usuarios/entregador/editar',
    'App\Http\Controllers\Usuarios\EntregadoresController@edit'
)->name('admin.usuarios.entregador.edit');

// Atualiza Conferente
Route::put(
    'usuarios/entregador/atualizar',
    'App\Http\Controllers\Usuarios\EntregadoresController@update'
)->name('admin.usuarios.entregador.update');


/*
 * Mercado Livre
 */
// Retorna pagina de dados da conta principal
Route::get(
    'admin/mercadolivre/conta-sincronizada',
    'App\Http\Controllers\Admin\MercadoLivre\IntegracaoMeLiAdminController@contaPrincipal'
)->name('admin.mercadolivre.conta-sincronizada');

// Retorna pagina de dados da conta principal
Route::put(
    'admin/mercadolivre/conta-sincronizada',
    'App\Http\Controllers\Admin\MercadoLivre\IntegracaoMeLiAdminController@update'
)->name('admin.mercadolivre.conta-sincronizada.update');

// Todas contas MeLi sincronizadas
Route::get(
    'admin/mercadolivre/contas-sincronizadas',
    'App\Http\Controllers\Admin\MercadoLivre\ContasMercadoLivreController@todasContas'
)->name('admin.mercadolivre.contas-sincronizadas');

/*
 * Precos Fretes
 */
// tabela
Route::get(
    'admin/fretes/tabela/{tipo}',
    'App\Http\Controllers\Admin\FretesController@tabela'
)->name('admin.fretes.tabela');
// formulario valores
Route::get(
    'admin/fretes/atualiza-preco', 
    'App\Http\Controllers\Admin\FretesController@editaPrecoClientes'
)->name('admin.fretes.atualiza-preco-clientes');
// update valores frete
Route::put(
    'admin/fretes/atualiza-preco', 
    'App\Http\Controllers\Admin\FretesController@atualizaPrecoClientes'
)->name('admin.fretes.atualiza-preco-clientes');

// entregadores



/*
 * Configuracoes
 */
// Pagina
Route::get(
    'admin/config/config-geral',
    'App\Http\Controllers\Admin\ConfigController@geral'
)->name('admin.config.config-geral');
// rota 
Route::put(
    'admin/config/config-geral',
    'App\Http\Controllers\Admin\ConfigController@update'
)->name('admin.config.config-geral');

/*
 * PACOTES
 */
Route::get(
    'admin/pacotes/historico',
    'App\Http\Controllers\Admin\Pacotes\PacotesController@historico'
)->name('admin.pacotes.historico');

Route::get(
    'admin/pacotes/historico-diario',
    'App\Http\Controllers\Admin\Pacotes\PacotesController@historicoDiario'
)->name('admin.pacotes.historico-diario');

Route::get(
    'admin/pacotes/detalhes',
    'App\Http\Controllers\Admin\Pacotes\PacotesController@info'
)->name('admin.pacotes.detalhes');


/*
 * Coletas
 */
Route::get(
    'admin/coletas/historico',
    'App\Http\Controllers\Admin\Coletas\ColetasController@historico'
)->name('admin.coletas.historico');

Route::get(
    'admin/coletas/historico-diario',
    'App\Http\Controllers\Admin\Coletas\ColetasController@historicoDiario'
)->name('admin.coletas.historico-diario');

Route::get(
    'admin/coletas/detalhes',
    'App\Http\Controllers\Admin\Coletas\ColetasController@info'
)->name('admin.coletas.detalhes');

//Config Coletas
Route::get(
    'admin/coletas/config',
    'App\Http\Controllers\Admin\Coletas\ColetasController@config'
)->name('admin.coletas.config');

//Config Coletas
Route::put(
    'admin/coletas/config',
    'App\Http\Controllers\Admin\Coletas\ColetasController@update'
)->name('admin.coletas.config-update');


/*
 * Financeiro
 */
/*  Conta Mercado Pago */
Route::get(
    'admin/financeiro/conta-mercadopago',
    'App\Http\Controllers\Admin\Financeiro\MercadoPagoController@index'
)->name('admin.financeiro.conta-mercadopago');

Route::put(
    'admin/financeiro/conta-mercadopago',
    'App\Http\Controllers\Admin\Financeiro\MercadoPagoController@update'
)->name('admin.financeiro.conta-mercadopago');

/*  Clientes Financeiro */

// todos clientes
Route::get(
    'admin/financeiro/clientes',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@index'
)->name('admin.financeiro.cliente');
// historico mes
Route::get(
    'admin/financeiro/cliente',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@historicoMes'
)->name('admin.financeiro.cliente-mes');
// historico mes
Route::get(
    'admin/financeiro/cliente/detalhes-mensal',
    'App\Http\Controllers\Admin\Financeiro\ClientesController@historicoDetalhesMes'
)->name('admin.financeiro.cliente.detalhes-mensal');

/* Entregadores Financeiro */
// todos entregadores
Route::get(
    'admin/financeiro/entregadores',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@index'
)->name('admin.financeiro.entregadores');
// historico mes
Route::get(
    'admin/financeiro/entregador',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@historicoMes'
)->name('admin.financeiro.entregador-mes');
// historico mes
Route::get(
    'admin/financeiro/entregador/detalhes-mensal',
    'App\Http\Controllers\Admin\Financeiro\EntregadoresController@historicoDetalhesMes'
)->name('admin.financeiro.entregador.detalhes-mensal');