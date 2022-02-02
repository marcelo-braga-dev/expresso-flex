<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'auth.admin'],
    'namespace' => 'App\Http\Controllers\Admins',
], function () {
    include_once 'integracoes.php';
    include_once  'usuarios.php';
    include_once  'pacotes.php';
});
