<?php

use Illuminate\Support\Facades\Route;

/*
* Entregadores
*/
//---INICIO---//
// Abre camera cadastro pacote pelo entregador - em uso
Route::get('entreagadores/pacotes/qrcode/cadastro-mercadolivre/start?idColeta={idColeta}&idSeller={idSeller}', function () {
    echo "Use o App Expresso Fles";
    exit();
})->name('entregadores.pacotes.qrcode.cadastro.meli.start');

// Recebe dados para cadastro do pacote
Route::get(
    'entreagadores/pacotes/qrcode/cadastro-mercadolivre/back',
    [\App\Http\Controllers\Entregadores\Coletas\QrCode\CadastrarPacoteController::class, 'execute'])
    ->name('entregadores.pacotes.qrcode.cadastro.meli.end');
//---FIM--//

//---INICIO---//
// Cadastra produtos por qrcode - em uso
Route::get('entregadores/pacotes/qrcode/saida-entrega/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregadores.pacotes.qrcode.saida-entrega.start');

Route::get('entregadores/pacotes/qrcode/saida-entrega/back',
    [\App\Http\Controllers\Entregadores\Entregas\QrCode\CheckinEntregaPacote::class, 'index'])
    ->name('entregadores.pacotes.qrcode.saida-entrega.back');
//---FIM--//


/*
* Conferente
*/
//--INICO--//
//CHECKIN de pacotes pelo conferente - em uso
Route::get('conferente/pacotes/qrcode/checkin/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('conferente.pacotes.qrcode.checkin.start');

// Recebe dados checkin do pacote
Route::get('conferente/pacotes/qrcode/checkin/back',
    [\App\Http\Controllers\QrCode\ConferenteController::class, 'infoCheckin'])
    ->name('conferente.pacotes.qrcode.checkin.end');
//--FIM--//



// Entrega Pacote Cliente
Route::get('entregadores/pacotes/qrcode/entrega-cliente/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregadores.pacotes.qrcode.entrega-cliente.start');

Route::get('entregadores/pacotes/qrcode/entrega-cliente/back',
    [\App\Http\Controllers\QrCode\EntregadoresController::class, 'entregarDestinatario'])
    ->name('entregadores.pacotes.qrcode.entrega-cliente.back');


//Ler QRCode do Usuario Cliente
Route::get('conferente/pacotes/qrcode/checkout/start', function () {
    echo "ABRIR CAMERA";
    exit();
})->name('entregador.qrcode.usuario.cliente.start');

// Recebe dados checkin do pacote
Route::get('conferente/pacotes/qrcode/checkout/back',
    [\App\Http\Controllers\QrCode\AbrirSolicitacaoColetaController::class, 'index'])
    ->name('entregador.qrcode.usuario.cliente.end');



// Gerador de QrCode
// Route::get('cliente/pacotes/qrcode/gerar-qrcode', 'App\src\QrCode\GeradorQrCode@index')
//     ->name('cliente.pacotes.qrcode.gerar-qrcode');
