<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\src\Usuarios\Clientes;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function new(Request $request)
    {
        $cliente = new Clientes();

        $cliente->create($request, false);
        
        $sucesso = 'ok';

        return redirect()->back()->withErrors(compact('sucesso'));
    } 
}
