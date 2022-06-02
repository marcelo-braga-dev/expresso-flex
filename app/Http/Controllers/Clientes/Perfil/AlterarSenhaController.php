<?php

namespace App\Http\Controllers\Clientes\Perfil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlterarSenhaController extends Controller
{
    public function index()
    {
        $user = (new User())->newQuery()->findOrFail(id_usuario_atual());

        return view('pages.clientes.perfil.alterar-senha.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if ($request->nova_senha == $request->repetir_senha) {
            $user = new User();
            $user = $user->newQuery()
                ->findOrFail($id);
            $user->update([
                'password' => Hash::make($request->nova_senha)
            ]);
            modalSucesso('Senha alterada com sucesso');
        } else modalErro('Nova senha e repetir nova senha não coincidem.');

        return redirect()->back();
    }
}
