<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipoUsuario = auth()->user()->tipo;

        switch ($tipoUsuario)
        {
            case 'admin'        : return view('pages.admin.home');
            case 'cliente'      : return redirect()->route('cliente.home.index');
            case 'entregador'   : return redirect()->route('entregador.home.index');
            case 'conferente'   : return redirect()->route('conferente.home.index');
        }

        return view('dashboard');
    }
}
