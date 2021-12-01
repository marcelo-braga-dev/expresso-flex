<?php

namespace App\Http\Controllers\Admin\Usuarios;

use App\Models\User;
use App\Service\Usuarios\UsuariosService;
use App\src\Usuarios\Admin;
use Illuminate\Http\Request;

class AdminController
{
    public function index(UsuariosService $clsUsuarioService)
    {
        $novaConta = $clsUsuarioService->getNovosUsuarios();

        $admins = User::where('tipo', '=', 'admin')->orderBy('id', 'desc')->get();

        return view('pages.admin.usuarios.admin.tabela-admins', compact('admins', 'novaConta'));
    }

    public function info(Request $request)
    {
        $usuario = User::find($request->id);

        $dados = $this->getDados($usuario);

        return view('pages.admin.usuarios.info-usuario', compact('usuario', 'dados'));
    }

    private function getDados($usuario): array
    {
        $dados = [];

        $userMeta = $usuario->meta;

        foreach ($userMeta as $meta) {
            $dados[$meta->meta_key] = $meta->value;
        }
        return $dados;
    }

    public function create(Request $request)
    {
        $clientes = new Admin();

        $clientes->create($request);

        return redirect()->route('admin.usuarios.admin.tabela');
    }

    public function edit(Request $request)
    {
        $usuario = User::find($request->id);

        $dados = $this->getDados($usuario);

        return view('pages.admin.usuarios.admin.novo-admin', compact('usuario', 'dados'));
    }

    public function update(Request $request)
    {
        $clientes = new Admin();

        $clientes->update($request);

        return redirect()->route('admin.usuarios.admin.tabela');
    }
}


