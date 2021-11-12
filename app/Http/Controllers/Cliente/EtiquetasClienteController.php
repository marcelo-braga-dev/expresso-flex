<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Service\Lojas\LojasService;
use App\src\Etiquetas\NovaEtiquetaExpressoFlex;
use App\src\Pacotes\Pacote;
use Illuminate\Http\Request;

class EtiquetasClienteController extends Controller
{
    public function index()
    {
        $pacotes = Pacotes::query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('status', '=', 'pacote_nova_etiqueta')
            ->orderBy('id', 'DESC')
            ->get();

        return view('pages.cliente.pacotes.etiquetas.todas-etiquetas', compact('pacotes'));
    }

    public function new()
    {
        $lojasService = new LojasService();
        $pontosColeta = $lojasService->getLojasCliente(id_usuario_atual());

        return view('pages.cliente.pacotes.etiquetas.criar-etiqueta', compact('pontosColeta'));
    }

    public function store(Request $request)
    {
        $pacote = new Pacote();

        $rastreio = $pacote->criarPacote(
            $request,
            id_usuario_atual(),
            'expresso_flex',
            $request->endereco,
            'pacote_nova_etiqueta',
            $request->loja
        );

        session()->flash('sucesso', 'Etiqueta ' . $rastreio . ' gerada com sucesso.');

        return redirect()->route('cliente.etiqueta.todas-etiquetas');
    }

    public function imprimir(Request $request)
    {
        $novaEtiqueta = new NovaEtiquetaExpressoFlex();

        return $novaEtiqueta->novaEtiqueta($request);

    }
}
