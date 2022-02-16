<?php

namespace App\Http\Controllers\Clientes\Perfil;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserMeta;
use App\src\Usuarios\Clientes;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return redirect()->route('clientes.perfil.edit', id_usuario_atual());
    }

    public function edit()
    {
        $meta = [];

        $user = User::find(id_usuario_atual())->toArray();
        $userMetas = UserMeta::query()
            ->where('user_id', '=', $user['id'])
            ->get();

        foreach ($userMetas as $arg) {
            $meta[$arg['meta_key']] = $arg['value'];
        }

        $user = array_merge($user, $meta);

        return view('pages.clientes.perfil.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $cls = new Clientes();

        $user = $cls->editaUsuario($request, $id);

        $cls->metaValues($request, $user->id);

        session()->flash('sucesso', 'Informações editadas com sucesso.');

        return redirect()->back();
    }
}
