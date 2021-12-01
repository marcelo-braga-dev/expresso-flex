<?php

namespace App\Http\Controllers\Admin\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\PasswordNew;
use App\Models\PrecosFretes;
use App\Models\User;
use App\Service\Usuarios\UsuariosService;
use App\src\Usuarios\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(UsuariosService $clsUsuarioService)
    {        
        $novaConta = $clsUsuarioService->getNovosUsuarios();
        
        $clientes = User::where('tipo', '=', 'cliente')->orderBy('id', 'desc')->get();

        return view('pages.admin.usuarios.clientes.tabela-clientes', compact('clientes', 'novaConta'));
    }

    public function info(Request $request)
    {
        $clsPasswordNew = new PasswordNew();

        $usuario = User::find($request->id);

        $hash = $clsPasswordNew->query()->
            where('email', '=', $usuario->email)
            ->first('token');

        $dados = $this->getDados($usuario);

        return view('pages.admin.usuarios.info-usuario', compact('usuario', 'dados', 'hash'));
    }

    public function create(Request $request)
    {
        $clientes = new Clientes();

        $clientes->create($request);

        return redirect()->route('admin.usuarios.clientes.tabela');
    }

    public function edit(Request $request)
    {
        $usuario = User::find($request->id);

        $fretes = [];

        $dados = $this->getDados($usuario);

        $precosFretes = new PrecosFretes();

        $todosFretes = $precosFretes->query()
            ->where('user_id', '=', $usuario->id)->get();

        foreach ($todosFretes as $frete)
        {
            $fretes[$frete->meta_key] = $frete->value;
        }

        return view('pages.admin.usuarios.clientes.novo-cliente', compact('usuario', 'dados', 'fretes'));
    }

    public function update(Request $request)
    {
        $clientes = new Clientes();

        $clientes->update($request);

        return redirect()->route('admin.usuarios.clientes.tabela');
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
}
