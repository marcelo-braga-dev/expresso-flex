<?php

namespace App\Http\Controllers\Admins\Usuarios;

use App\Models\User;
use App\Service\Usuarios\UsuariosService;
use App\src\Usuarios\Admin;
use Illuminate\Http\Request;

class AdminsController
{
    public function index()
    {
        $clsUsuarioService = new UsuariosService();

        $novaConta = $clsUsuarioService->getNovosUsuarios();

        $admins = User::where('tipo', '=', 'admin')->orderBy('id', 'desc')->get();

        return view('pages.admins.usuarios.admins.index', compact('admins', 'novaConta'));
    }

    public function create()
    {
        return view('pages.admins.usuarios.admins.create');
    }

    public function store(Request $request)
    {
        try {
            (new Admin())->create($request);
        } catch (\DomainException $e) {
            modalErro($e->getMessage());
        }

        return redirect()->route('admins.usuarios.admins.index');
    }

    public function edit($id)
    {
        $usuario = User::find($id);

        $dados = [];

        $userMeta = $usuario->meta;

        foreach ($userMeta as $meta) {
            $dados[$meta->meta_key] = $meta->value;
        }

        return view('pages.admins.usuarios.admins.edit', compact('usuario', 'dados'));
    }

    public function update(Request $request, $id)
    {
        $clientes = new Admin();

        $clientes->update($request, $id);

        return redirect()->route('admins.usuarios.admins.index');
    }
}
