<?php

namespace App\Http\Controllers\Clientes\ImportacaoPacotes;

use App\Http\Controllers\Controller;
use App\Models\Etiquetas;
use Illuminate\Http\Request;

class ImportacoesController extends Controller
{
    public function index()
    {
        $origem = 'mercado_livre';

        $etiquetasMercadoLivre = new Etiquetas();
        $etiquetas = $etiquetasMercadoLivre->origem($origem);

        return view('pages.clientes.importacoes.index', compact('etiquetas'));
    }
}
