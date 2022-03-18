<?php

namespace App\Http\Controllers\Entregadores;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.entregadores.home');
    }
}
