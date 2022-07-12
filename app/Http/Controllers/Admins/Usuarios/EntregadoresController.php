<?php

namespace App\Http\Controllers\Admins\Usuarios;

use App\Models\PasswordNew;
use App\Models\RegioesEntregadores;
use App\Models\User;
use App\Service\FretesService;
use App\Service\Usuarios\UsuariosService;
use App\src\Usuarios\Entregadores;
use Illuminate\Http\Request;

class EntregadoresController
{
    public function index()
    {
        $regioesEntregador = new RegioesEntregadores;
        $clsUsuarioService = new UsuariosService;
        $users = new User;

        $regioes = [];
        $clsFretesService = new FretesService;

        $novaConta = $clsUsuarioService->getNovosUsuarios();

        $entregadores = $users->query()
            ->where('tipo', '=', 'entregador')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->get(['id', 'name', 'status', 'email']);

        $regioesEntregadores = $regioesEntregador->query()->get();

        foreach ($regioesEntregadores as $regiao) {
            if (!empty($regiao->value)) {
                $regioes[$regiao->user_id][$regiao->meta_key][] = $regiao->value;
            }
        }

        $fretes = $clsFretesService->getPrecosFretes('entregador');

        return view(
            'pages.admins.usuarios.entregadores.index',
            compact('entregadores', 'regioes', 'novaConta', 'fretes')
        );
    }

    public function create()
    {
        return view('pages.admins.usuarios.entregadores.create');
    }

    public function store(Request $request)
    {
        try {
            (new Entregadores())->create($request);
        } catch (\DomainException $e) {
            modalErro($e->getMessage());
        }

        return redirect()->route('admins.usuarios.entregadores.index');
    }

    public function edit($id)
    {
        $usuario = User::find($id);

        $regioes = [];
        $regioes['regiao_coleta'] = [];
        $regioes['regiao_entrega'] = [];

        $dados = [];

        $userMeta = $usuario->meta;

        foreach ($userMeta as $meta) {
            $dados[$meta->meta_key] = $meta->value;
        }

        $regioesEntregador = $usuario->entregador()->get();

        foreach ($regioesEntregador as $regiao) {
            $regioes[$regiao->meta_key][] = $regiao->value;
        }

        return view(
            'pages.admins.usuarios.entregadores.edit',
            compact('usuario', 'dados', 'regioes')
        );
    }

    public function update(Request $request, $id)
    {
        $user = new Entregadores();
        $user->update($request);

        return redirect()->route('admins.usuarios.entregadores.index');
    }

    public function show($id)
    {
        $users = new User();
        $usuario = $users->newQuery()->find($id);
        if (empty($usuario)) return redirect()->route('admins.usuarios.entregadores.index');

        $dados = $users->metaValues($id);

        $passwordNews = new PasswordNew();
        $token = $passwordNews->getToken($usuario->email);

        return view('pages.admins.usuarios.entregadores.show',
            compact('usuario', 'dados', 'token'));
    }
}
