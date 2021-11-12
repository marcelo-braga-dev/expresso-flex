<?php

namespace App\Http\Controllers\Integracao;

use App\Http\Controllers\Controller;
use App\Models\IntegracaoMercadoLivre;
use App\src\MercadoLivre\AutenticacaoAutorizacaoMercadoLivre;
use App\src\MercadoLivre\RecursosApiMercadoLivre;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MercadoLivreController extends Controller
{
    // Pagina mostrar todas as contas
    public function todasContas(IntegracaoMercadoLivre $integracao)
    {
        $contas = $integracao->query()
            ->where('user_id', '=', id_usuario_atual())
            ->get()
            ->toArray();

        return view('pages.cliente.integracao.mercadolivre.todas-contas', compact('contas'));
    }

    // Pagina para integrar nova conta Mercado Livre
    public function novaConta()
    {
        $autenticacao = new AutenticacaoAutorizacaoMercadoLivre();

        $urlIntegracao = $autenticacao->urlAutorizacao();

        return view('pages.cliente.integracao.mercadolivre.nova-conta', compact('urlIntegracao'));
    }

    // Rota para Autenticar conta Mercado Livre
    public function retornoAutenticacao(Request $request)
    {
        $autenticacao = new AutenticacaoAutorizacaoMercadoLivre();

        $arg = $request->toArray();

        $code = $arg['code'];

        $autenticacao->autenticar($code);

        return redirect()->route('mercadolivre.todas-contas');
    }

    // Recebe notificacoes do Mercado Livre
    public function getNotificacaoMeli()
    {
        // Pagina para receber notificacoes do MeLi
    }


    /* * */
    public function teste()
    {
        $recursos = new RecursosApiMercadoLivre();

        $res = $recursos->teste();

        print_pre($res);
    }
}
