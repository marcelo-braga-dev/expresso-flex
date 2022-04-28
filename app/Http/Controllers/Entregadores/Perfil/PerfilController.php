<?php

namespace App\Http\Controllers\Entregadores\Perfil;

use App\Models\User;
use App\Models\UserMeta;
use App\src\Usuarios\Usuarios;
use Illuminate\Http\Request;

class PerfilController
{
    public function edit($id)
    {
        if ($id != id_usuario_atual()) return redirect()->route('home');

        $clsUser = new User();
        $user = $clsUser->newQuery()
            ->find($id, ['id', 'name', 'email']);

        $meta = $clsUser->metaValues($id);
        $userArray = $user->toArray();
        $usuario = array_merge($userArray, $meta);

        return view('pages.entregadores.perfil.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = new Usuarios();
        $usuario->editaUsuario($request, $id);

        $metaValues = new UserMeta();

        $metaValues->newQuery()
            ->updateOrInsert(['meta_key' => 'cpf', 'user_id' => $id], ['value' => $request->cpf]);
        $metaValues->newQuery()
            ->updateOrInsert(['meta_key' => 'celular', 'user_id' => $id], ['value' => $request->celular]);

        return redirect()->back();
    }
}
