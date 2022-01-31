<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use App\Models\User;
use App\Models\UserMeta;
use App\src\Usuarios\Clientes;
use App\src\Usuarios\Usuarios;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
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

        return view('pages.cliente.perfil.editar-perfil', compact('user'));
    }

    public function update(Request $request)
    {
        $cls = new Clientes();

        $user = $cls->editaUsuario($request, $request->id);

        $cls->metaValues($request, $user->id);

        session()->flash('sucesso', 'Informações editadas com sucesso.');

        return redirect()->back();
    }
}
