<?php
/*
* Entregadores
*/
// Abre camera cadastro pacote
Route::get('entreagadores/pacotes/qrcode/cadastro-mercadolivre/start?idColeta={idColeta}&idSeller={idSeller}', function () {
    echo "Use o App Expresso Fles";
    exit();
})->name('entregadores.pacotes.qrcode.cadastro.meli.start');

// Recebe dados para cadastro do pacote
Route::get('entreagadores/pacotes/qrcode/cadastro-mercadolivre/back', 'App\Http\Controllers\QrCode\EntregadoresController@novoPacote')
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

//CHECKOUT
// Abre camera checkin
Route::get('conferente/pacotes/qrcode/checkout/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('conferente.pacotes.qrcode.checkin.start');

// Recebe dados checkin do pacote
Route::get('conferente/pacotes/qrcode/checkout/back', 'App\Http\Controllers\QrCode\ConferenteController@infoCheckin')
    ->name('conferente.pacotes.qrcode.checkin.end');

/* Entregadores */

// Cadastra produtos por qrcode 
Route::get('entregadores/pacotes/qrcode/saida-entrega/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregadores.pacotes.qrcode.saida-entrega.start');
// Route Volta
Route::get('entregadores/pacotes/qrcode/saida-entrega/back', 'App\Http\Controllers\QrCode\EntregadoresController@cadastrarEntrega')
    ->name('entregadores.pacotes.qrcode.saida-entrega.back');

// Entrega Pacote Cliente 
Route::get('entregadores/pacotes/qrcode/entrega-cliente/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregadores.pacotes.qrcode.entrega-cliente.start');
// Route Volta
Route::get('entregadores/pacotes/qrcode/entrega-cliente/back', 'App\Http\Controllers\QrCode\EntregadoresController@entregarDestinatario')
    ->name('entregadores.pacotes.qrcode.entrega-cliente.back');


// entregadores/pacotes/qrcode/entrega-cliente/start
// entregadores/pacotes/qrcode/entrega-cliente/back
/*  */

// Gerador de QrCode
Route::get('cliente/pacotes/qrcode/gerar-qrcode', 'App\src\QrCode\GeradorQrCode@index')
    ->name('cliente.pacotes.qrcode.gerar-qrcode');
