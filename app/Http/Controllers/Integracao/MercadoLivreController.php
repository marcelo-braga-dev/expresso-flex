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
}
