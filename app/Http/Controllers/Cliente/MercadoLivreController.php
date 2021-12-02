<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\IntegracaoMercadoLivre;
use App\src\MercadoLivre\AutenticacaoAutorizacaoMercadoLivre;
use Illuminate\Http\Request;

class MercadoLivreController extends Controller
{
    // Pagina mostrar todas as contas
    public function todasContas(IntegracaoMercadoLivre $integracao)
    {
        $autenticacao = new AutenticacaoAutorizacaoMercadoLivre();

        $urlIntegracao = $autenticacao->urlAutorizacao();

        $contas = $integracao->query()
            ->where('user_id', '=', id_usuario_atual())
            ->get()
            ->toArray();

        return view('pages.cliente.integracao.mercadolivre.todas-contas', compact('contas', 'urlIntegracao'));
    }

    // Deletar Conta Mercado Livre
    public function delete($id) {
        $conta = IntegracaoMercadoLivre::find($id);

        if ($conta->user_id == id_usuario_atual()) {
            $conta->delete();
            
            session()->flash('sucesso', 'Conta removida com sucesso.');
        }
        
        return redirect()->back();
    }
}
