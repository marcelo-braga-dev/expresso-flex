<?php

use App\src\MercadoLivre\RecursosApiMercadoLivre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

include "rota/mail.php";

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    include 'rota/mercadolivre.php';

    include 'rota/qrcode.php';

    Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin'], function () {
        include 'rota/admin.php';
    });

    Route::group(
        [
            'namespace' => 'App\Http\Controllers\Cliente',
            'middleware' => 'auth.cliente',
            'prefix' => 'cliente'
        ],
        function () {
            include 'rota/cliente.php';
        }
    );

    Route::group(['middleware' => 'auth.entregador', 'prefix' => 'entregadores'], function () {
        include 'rota/entregador.php';
    });

    Route::group(['middleware' => 'auth.conferente', 'prefix' => 'conferente'], function () {
        include 'rota/conferente.php';
    });

    include 'rota/padrao.php';
});

// Formulario Externo Criar Criar Conta Cliente
Route::get(
    'cliente/criar-conta',
    function () {
        return view('pages.cliente.perfil.criar-conta');
    }
)->name('cliente.criar-conta');

Route::put(
    'cliente/criar-conta',
    'App\Http\Controllers\Admin\Usuarios\ClientesController@newExterno'
)->name('cliente.new');
//

Route::get(
    'teste/comunicacao-mercado-livre',
    function () {
        $cls = new RecursosApiMercadoLivre();
        //$res = $cls->teste();
        $cls->atualizarInfoContas();
        //print_pre($res);
    }
)->name('teste.comunicacao-mercado-livre');
