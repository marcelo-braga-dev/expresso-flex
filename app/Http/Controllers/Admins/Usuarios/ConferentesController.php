<?php

namespace App\Http\Controllers\Admins\Usuarios;

use App\Models\User;
use App\Service\Usuarios\UsuariosService;
use App\src\Usuarios\Conferente;
use Illuminate\Http\Request;

class ConferentesController
{

    public function index()
    {
        $clsUsuarioService = new UsuariosService;

        $novaConta = $clsUsuarioService->getNovosUsuarios();

        $conferentes = User::where('tipo', '=', 'conferente')->orderBy('id', 'desc')->get();

        return view('pages.admins.usuarios.conferentes.index', compact('conferentes', 'novaConta'));
    }

    public function create()
    {
        return view('pages.admins.usuarios.conferentes.create');
    }

    public function store(Request $request)
    {
        $clientes = new Conferente();
        $clientes->create($request);

        return redirect()->route('admins.usuarios.conferentes.index');
    }

    public function edit($id)
    {
        $usuario = User::find($id);

        $dados = [];

        $userMeta = $usuario->meta;

        foreach ($userMeta as $meta) {
            $dados[$meta->meta_key] = $meta->value;
        }

        return view('pages.admins.usuarios.conferentes.edit', compact('usuario','dados'));
    }

    public function update(Request $request, $id)
    {
        $clientes = new Conferente();

        $clientes->update($request, $id);

        return redirect()->route('admins.usuarios.conferentes.index');
    }
}
