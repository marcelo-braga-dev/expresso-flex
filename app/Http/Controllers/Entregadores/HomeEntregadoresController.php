<?php

namespace App\Http\Controllers\Entregadores;

use App\Http\Controllers\Controller;

class HomeEntregadoresController extends Controller
{
    public function index()
    {
        return view('pages.entregadores.home');
    }
}
