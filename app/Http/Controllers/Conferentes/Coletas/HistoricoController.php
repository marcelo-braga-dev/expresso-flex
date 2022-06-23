<?php

namespace App\Http\Controllers\Conferentes\Coletas;

use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use Illuminate\Http\Request;

class HistoricoController
{
    public function index()
    {
        $items = (new SolicitacaoRetiradas())->newQuery()
            ->orderBy('created_at', 'DESC')
            ->get();

        $solicitacoes = [];
        foreach ($items as $item) {
            $data = date('d/m/y', strtotime($item->updated_at));
            $solicitacoes[$data][] = $item->updated_at;
        }

        return view('pages.conferente.solicitacoes.historico.historico-geral', compact('solicitacoes'));
    }

    public function historicoDiario(Request $request)
    {
        $dia = $request->data;
        $data = date('Y-m-d', strtotime($dia));

        $solicitacoes = (new SolicitacaoRetiradas())->newQuery()
            ->orderBy('created_at', 'DESC')
            ->whereDate('updated_at', $data)
            ->get();

        $todosPacotes = (new Pacotes())->newQuery()->get();

        $pacotes = [];
        foreach ($todosPacotes as $item)
        {
            $pacotes[$item->coleta][] = 'x';
        }

        return view('pages.conferente.solicitacoes.historico.historico-diario', compact('solicitacoes', 'pacotes', 'dia'));
    }

    public function show($id)
    {
        $pacotes = (new Pacotes())->newQuery()
            ->where('coleta', '=', $id)
            ->get();

        return view('pages.conferente.solicitacoes.show', compact('pacotes'));
    }
}
