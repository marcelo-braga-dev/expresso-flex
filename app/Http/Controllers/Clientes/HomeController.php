<?php

namespace App\Http\Controllers\Clientes;

class HomeController
{
    public function index()
    {
        return view('pages.cliente.home');
    }
}
