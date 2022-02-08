<?php

namespace App\Http\Controllers\Clientes\ImportacaoPacotes;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use App\src\Integracoes\MercadoLivre\ImportacaoExcel\AnalizarArquivo;
use App\src\Integracoes\MercadoLivre\ImportacaoExcel\CadastrarEtiquetas;
use App\src\Integracoes\MercadoLivre\ImportacaoExcel\UploadArquivoExcel;
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
        $uploadArquivoExcel = new UploadArquivoExcel();
        $path = $uploadArquivoExcel->upload($request->arquivo);

        $analizarArquivo = new AnalizarArquivo();
        $dados = $analizarArquivo->executar($path);

        $etiquetas = new CadastrarEtiquetas();
        $etiquetas->cadastrar($dados, $request->loja);

        $uploadArquivoExcel->deletar($path);

        return redirect()->route('clientes.importacoes.pacotes.index');
    }
}
