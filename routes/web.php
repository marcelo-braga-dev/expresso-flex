<?php

use GuzzleHttp\Client;
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

    Route::get('/test-mercadolivre', function () {
        // $ curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/users/{User_id}
        $link = 'https://api.mercadolibre.com/users/670414268';
        $client = new Client();

        $res = $client->request('GET', $link, [
            'headers' => [
                'Authorization' => 'Bearer APP_USR-4953992378764962-052815-43666cdbfab87316cbddd2720eff96cf-670414268',
            ]
        ]);
    });
});
