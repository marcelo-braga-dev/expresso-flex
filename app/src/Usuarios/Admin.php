<?php

namespace App\src\Usuarios;

use App\Models\UserMeta;

class Admin extends Usuarios
{
    public function create($request)
    {
        // Cria Usuario
        $user = $this->cadastraUsuario($request, 'admin');

        if (session('erro')) return;

        // MataValues do Cliente
        $this->metaValues($request, $user->id);

        session()->flash('sucesso', 'Administrador ' . $request['nome'] . ' cadastrado com sucesso.');
    }

    private function metaValues($request, $userId)
    {
        $metaValues = new UserMeta();

        $metaValues->updateOrInsert(['meta_key' => 'celular', 'user_id' => $userId], ['value' => $request->celular]);
        $metaValues->updateOrInsert(['meta_key' => 'perfil', 'user_id' => $userId], ['value' => $request->perfil]);

    }

    public function update($request, $id)
    {
        $user = $this->editaUsuario($request, $id);

        $this->metaValues($request, $id);

        session()->flash('sucesso', 'Administrador ' . $request['nome'] . ' editado com sucesso.');
    }
}
