<?php

namespace App\Http\Controllers\Clientes\ImportacaoPacotes;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use App\src\Importacao\ImportacaoMercadoLivre;
use Illuminate\Http\Request;

class MercadoLivreController extends Controller
{
    public function index()
    {
        $lojasClientes = new LojasClientes();
        $lojas = $lojasClientes->lojasAtivas(id_usuario_atual());

        return view('pages.clientes.importacoes.mercadolivre.index', compact('lojas'));
    }

    public function edit(Request $request)
    {
        try {
            $loja = $request->loja;
            $dados = (new ImportacaoMercadoLivre())->cadastrar($request, $request->loja);
        } catch (\DomainException $e) {
            modalErro($e->getMessage());
            return redirect()->back();
        }

        return view('pages.clientes.importacoes.mercadolivre.edit', compact('dados', 'loja'));
    }
}
