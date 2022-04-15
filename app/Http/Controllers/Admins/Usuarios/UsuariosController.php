<?php

namespace App\Http\Controllers\Admins\Usuarios;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController
{
    public function modificaStatusUsuario(Request $request) {
        $user = User::find($request->id);

        $status = $request->value == 'true' ? '1' : '0';

        $user->update(['status' => $status]);

        return $user->nome;
    }
}
