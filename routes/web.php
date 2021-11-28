<?php

use App\src\MercadoLivre\RecursosApiMercadoLivre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) return redirect()->route('home');

    return view('auth/login');
});

Auth::routes();

include "rota/mail.php";

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    include 'rota/mercadolivre.php';

    include 'rota/qrcode.php';


    Route::group(['middleware' => 'auth.admin'], function () {
        include 'rota/admin.php';
    });

    Route::group(['middleware' => 'auth.cliente'], function () {
        include 'rota/cliente.php';
    });

    Route::group(['middleware' => 'auth.entregador'], function () {
        include 'rota/entregador.php';
    });

    Route::group(['middleware' => 'auth.conferente'], function () {
        include 'rota/conferente.php';
    });

    include 'rota/padrao.php';
});

Route::get(
    'cliente/criar-conta',
    function () {
        return view('pages.cliente.perfil.criar-conta');
    }
)->name('cliente.criar-conta');

Route::put(
    'cliente/criar-conta',
    'App\Http\Controllers\Cliente\PerfilController@new'
)->name('cliente.new');


Route::get(
    'teste/comunicacao-mercado-livre',
    function () {
        $cls = new RecursosApiMercadoLivre();
        //$res = $cls->teste();
        $cls->getInfoContaMeLi('443790977');
        //print_pre($res);
    }
)->name('cliente.criar-conta');
