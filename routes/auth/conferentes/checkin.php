<?php

use Illuminate\Support\Facades\Route;

Route::name('conferentes.')
    ->namespace('Checkin')
    ->group(function () {
        Route::resource('checkin', 'CheckinController');
    });
