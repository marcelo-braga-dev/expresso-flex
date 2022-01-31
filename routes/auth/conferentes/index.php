<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.conferente'],
    'namespace' => 'App\Http\Controllers\Conferentes',
], function () {
    include_once 'checkin.php';
});

