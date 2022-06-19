<?php
use Illuminate\Support\Facades\Route;

Route::name('conferentes.qrcode')
    ->namespace('QrCode')
    ->group(function () {

        Route::get('checkin-pacote', 'QrCodeController@checkinPacote')
            ->name('.checkin-pacote');
    });
