<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;

class HomeClienteController extends Controller
{
    public function index()
    {
        return view('pages.cliente.home');
    }
}
