<?php

namespace App\Http\Controllers\Admin\MercadoLivre;

use App\Http\Controllers\Controller;
use App\Models\IntegracaoMercadoLivre;
use Illuminate\Http\Request;

class ContasMercadoLivreController extends Controller
{
    public function todasContas()
    {
        $integracaoMercadoLivre = new IntegracaoMercadoLivre();

        $contas = [];

        $todasContas = $integracaoMercadoLivre->query()->orderBy('user_id', 'DESC')->get();

        foreach ($todasContas as $conta)
        {
            $contas[$conta->user_id]['user_id'] = $conta->user_id;
            $contas[$conta->user_id]['seller_id'][] = $conta->seller_id;
            $contas[$conta->user_id]['created_at'][] = $conta->created_at;
        }

        return view('pages.admin.mercadolivre.contas-sincronizadas', compact('contas'));
    }
}
