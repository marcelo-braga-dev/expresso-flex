<?php
use Illuminate\Support\Facades\Route;

Route::name('entregadores.qrcode')
    ->namespace('QrCode')
    ->group(function () {
        Route::get('qrcode?operacao={operacao}&url_retorno={url}', 'QrCodeController@index');

        Route::get('cadastrar-pacote', 'QrCodeController@cadastrarPacote')
            ->name('.cadastrarPacote');

        Route::get('nova-coleta', 'QrCodeController@novaColeta')
            ->name('.nova-coleta');
    });
