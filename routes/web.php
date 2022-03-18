<?php

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

    Route::group(['middleware' => 'auth.entregador', 'prefix' => 'entregadores'], function () {
        include 'rota/entregador.php';
    });

    Route::group(['middleware' => 'auth.conferente', 'prefix' => 'conferente'], function () {
        include 'rota/conferente.php';
    });
});
