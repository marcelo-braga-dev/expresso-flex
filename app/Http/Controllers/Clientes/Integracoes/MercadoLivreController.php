<?php

namespace App\Http\Controllers\Clientes\Integracoes;

use App\Http\Controllers\Controller;
use App\Models\IntegracaoMercadoLivre;
use App\Models\UsersNotifications;
use App\src\Integracoes\MercadoLivre\AutenticarAutorizar\Autenticar;
use Illuminate\Http\Request;

class MercadoLivreController extends Controller
{
    public function index()
    {
        $autenticacao = new Autenticar();
        $urlIntegracao = $autenticacao->getUrl();

        $contasIntegradas = new IntegracaoMercadoLivre();
        $contas = $contasIntegradas->newQuery()
            ->where('user_id', '=', id_usuario_atual())
            ->get();

        $notificacoes = (new UsersNotifications())->newQuery()
            ->where('user_id', '=', id_usuario_atual())
            ->where('status', '=', 1)
            ->get();

        return view('pages.clientes.integracoes.mercadolivre.index',
            compact('contas', 'urlIntegracao', 'notificacoes'));
    }

    public function autenticar(Request $request)
    {
        $autenticacao = new Autenticar();
        $autenticacao->autenticar($request->code);

        return redirect()->route('clientes.integracoes.mercadolivre.index');
    }
}
