<?php

namespace App\Http\Controllers\Admin\Usuarios;

use App\Models\User;
use App\Service\Usuarios\UsuariosService;
use App\src\Usuarios\Conferente;
use Illuminate\Http\Request;

class ConferenteController
{
    public function index(UsuariosService $clsUsuarioService)
    {
        $novaConta = $clsUsuarioService->getNovosUsuarios();

        $conferentes = User::where('tipo', '=', 'conferente')->orderBy('id', 'desc')->get();

        return view('pages.admin.usuarios.conferente.tabela-conferente', compact('conferentes', 'novaConta'));
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
        $clientes = new Conferente();

        $clientes->create($request);

        return redirect()->route('admin.usuarios.conferentes.tabela');
    }

    public function edit(Request $request)
    {
        $usuario = User::find($request->id);

        $dados = $this->getDados($usuario);

        return view('pages.admin.usuarios.conferente.novo-conferente', compact('usuario', 'dados'));
    }

    public function update(Request $request)
    {
        $clientes = new Conferente();

        $clientes->update($request);

        return redirect()->route('admin.usuarios.conferentes.tabela');
    }
}
