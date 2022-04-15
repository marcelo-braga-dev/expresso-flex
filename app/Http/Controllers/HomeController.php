<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
            case 'admin'        : return redirect()->route('admin.home.index');
            case 'cliente'      : return redirect()->route('cliente.home.index');
            case 'entregador'   : return redirect()->route('entregador.home.index');
            case 'conferente'   : return redirect()->route('conferente.home.index');
        }

        Auth::logout();
        session()->flash('erro', 'Não foi posível identificar o tipo da sua conta.');
        return redirect()->route('login');
    }
}
