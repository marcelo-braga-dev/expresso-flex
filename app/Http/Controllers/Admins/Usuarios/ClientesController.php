<?php

namespace App\Http\Controllers\Admins\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\FretesService;
use App\Service\Usuarios\UsuariosService;
use App\src\Usuarios\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clsUsuarioService = new UsuariosService();
        $novaConta = $clsUsuarioService->getNovosUsuarios();

        $users = new User();
        $clientes = $users->usuarios('cliente');

        $clsFretesService = new FretesService;

        $fretes = $clsFretesService->getPrecosFretes('cliente');

        return view('pages.admins.usuarios.clientes.index', compact('clientes', 'novaConta', 'fretes'));
    }

    public function create()
    {
        return view('pages.admins.usuarios.clientes.create');
    }

    public function store(Request $request)
    {
        $clientes = new Clientes();
        $clientes->cadastrar($request);

        return redirect()->route('admins.usuarios.clientes.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = new User();
        $cliente = $user->newQuery()
            ->where('id', '=', $id)
            ->first();

        return view('pages.admins.usuarios.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        print_pre($request->all());
    }

    public function destroy($id)
    {
        //
    }
}