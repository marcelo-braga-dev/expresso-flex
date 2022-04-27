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

    public function store(Request $request)
    {
        (new ImportacaoMercadoLivre())->execute($request);

        return redirect()->route('clientes.importacoes.pacotes.index');
    }
}
