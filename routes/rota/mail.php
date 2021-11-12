<?php

use App\Models\PasswordNew;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

Route::get('mail/usuario/novo-usuaro', 'App\Mail\NovoUsuarioMail@build');

// Confirmar nova senha
Route::get('mail/usuario/nova-senha/{email}/{hash}', 'App\Http\Controllers\Auth\NovaSenhaController@index')
->name('mail.usuario.retorno.novo-senha');

// Salvar nova senha
Route::put('mail/usuario/nova-senha/salvar', 'App\Http\Controllers\Auth\NovaSenhaController@update')
->name('mail.usuario.senha.salvar-nova-senha');
