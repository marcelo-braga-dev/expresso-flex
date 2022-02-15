<?php

/* Home */
Route::get('home', 'HomeClienteController@index')
    ->name('cliente.home.index');

/* Perfil */
// Edita Perfil
Route::get('perfil/editar', 'PerfilController@edit')->name('cliente.perfil.editar');

// Update Perfil
Route::put('perfil/update', 'PerfilController@update')->name('cliente.perfil.update');



/* Mercado Livre */
// Todas as contas do usuario
Route::get(
    'mercadolivre/todas-contas',
    'MercadoLivreController@todasContas'
)->name('mercadolivre.todas-contas');

// Excluir Conta
Route::get(
    'mercadolivre/excluir-conta/{id}',
    'MercadoLivreController@delete'
)->name('mercadolivre.excluir-conta');

