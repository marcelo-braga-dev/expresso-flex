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
        $lojas = $lojasClientes->lojas(id_usuario_atual());

        return view('pages.clientes.importacoes.mercadolivre.index', compact('lojas'));
    }

    public function edit(Request $request)
    {
        try {
            $dados = (new ImportacaoMercadoLivre())->read($request);
            $loja = $request->loja;
        } catch (\DomainException $e) {
            return redirect()->back();
        }
        modalSucesso('Verifique os pacotes a serem importados e clique no botão "Continuar".');
        return view('pages.clientes.importacoes.mercadolivre.edit', compact('dados', 'loja'));
    }

    public function store(Request $request)
    {
        $dados = json_decode($request->dados, true );
        (new ImportacaoMercadoLivre())->armazenar($dados, $request->loja);

        return redirect()->route('clientes.importacoes.pacotes.index');
    }
}
