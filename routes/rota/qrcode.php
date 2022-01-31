<?php

use Illuminate\Support\Facades\Route;

/*
* Entregadores
*/
// Abre camera cadastro pacote - em uso

Route::get('entreagadores/pacotes/qrcode/cadastro-mercadolivre/start?idColeta={idColeta}&idSeller={idSeller}', function () {
    echo "Use o App Expresso Fles";
    exit();
})->name('entregadores.pacotes.qrcode.cadastro.meli.start');

// Recebe dados para cadastro do pacote
Route::get('entreagadores/pacotes/qrcode/cadastro-mercadolivre/back', 'App\Http\Controllers\QrCode\CadastrarPacoteController@index')
    ->name('entregadores.pacotes.qrcode.cadastro.meli.end');


/*
* Conferente
*/
//CHECKIN
// Abre camera checkin
Route::get('conferente/pacotes/qrcode/checkin/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('conferente.pacotes.qrcode.checkin.start');

// Recebe dados checkin do pacote
Route::get('conferente/pacotes/qrcode/checkin/back', 'App\Http\Controllers\QrCode\ConferenteController@infoCheckin')
    ->name('conferente.pacotes.qrcode.checkin.end');

/* Entregadores */

// Cadastra produtos por qrcode - em uso
Route::get('entregadores/pacotes/qrcode/saida-entrega/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregadores.pacotes.qrcode.saida-entrega.start');
// Route Volta
Route::get('entregadores/pacotes/qrcode/saida-entrega/back', 'App\Http\Controllers\QrCode\SairParaEntregaPacoteController@index')
    ->name('entregadores.pacotes.qrcode.saida-entrega.back');


// Entrega Pacote Cliente
Route::get('entregadores/pacotes/qrcode/entrega-cliente/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregadores.pacotes.qrcode.entrega-cliente.start');
// Route Volta
Route::get('entregadores/pacotes/qrcode/entrega-cliente/back', 'App\Http\Controllers\QrCode\EntregadoresController@entregarDestinatario')
    ->name('entregadores.pacotes.qrcode.entrega-cliente.back');


//Ler QRCode do Usuario Cliente
Route::get('conferente/pacotes/qrcode/checkout/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregador.qrcode.usuario.cliente.start');

// Recebe dados checkin do pacote
Route::get('conferente/pacotes/qrcode/checkout/back', 'App\Http\Controllers\QrCode\EntregadoresController@identificaUsuario')
    ->name('entregador.qrcode.usuario.cliente.end');



// Gerador de QrCode
// Route::get('cliente/pacotes/qrcode/gerar-qrcode', 'App\src\QrCode\GeradorQrCode@index')
//     ->name('cliente.pacotes.qrcode.gerar-qrcode');
