<?php


namespace App\Http\Controllers\Usuarios;

use App\Models\RegioesEntregadores;
use App\Models\User;
use App\Service\Entregadores\EntregadoresService;
use App\src\Usuarios\Entregadores;
use Illuminate\Http\Request;


class EntregadoresController
{
    public function index(RegioesEntregadores $regioesEntregador)
    {
        $users = new User();

        $regioes = [];

        $entregadores = $users->query()
            ->where('tipo', '=', 'entregador')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->get(['id', 'nome', 'status', 'email']);

        $regioesEntregadores = $regioesEntregador->query()->get();

        foreach ($regioesEntregadores as $regiao) {
            if (!empty($regiao->value)) {
                $regioes[$regiao->user_id][$regiao->meta_key][] = $regiao->value;
            }
        }

        return view(
            'pages.admin.usuarios.entregadores.tabela-entregadores',
            compact('entregadores', 'regioes')
        );
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
        $entregadores = new Entregadores();

        $entregadores->create($request);

        return redirect()->route('admin.usuarios.entregadores.tabela');
    }

    public function edit(Request $request)
    {
        $usuario = User::find($request->id);

        $regioes = [];
        $regioes['regiao_coleta'] = [];
        $regioes['regiao_entrega'] = [];

        $dados = $this->getDados($usuario);

        $regioesEntregador = $usuario->entregador()->get();

        foreach ($regioesEntregador as $regiao) {
            $regioes[$regiao->meta_key][] = $regiao->value;
        }

        return view(
            'pages.admin.usuarios.entregadores.novo-entregador',
            compact('usuario', 'dados', 'regioes')
        );
    }

    public function update(Request $request)
    {
        $clientes = new Entregadores();

        $clientes->update($request);

        return redirect()->route('admin.usuarios.entregadores.tabela');
    }
}
