<?php

namespace App\Http\Controllers\Conferentes\Coletas;

use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use Illuminate\Http\Request;

class HistoricoController
{
    public function index()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoes = [];

        $_solicitacoes = $solicitacaoRetiradas->query()
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_solicitacoes as $arg) {
            $data = date('d/m/y', strtotime($arg->updated_at));

            $solicitacoes[$data][] = $arg->updated_at;
        }

        return view('pages.conferente.solicitacoes.historico.historico-geral', compact('solicitacoes'));
    }

    public function historicoDiario(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();
        $clsPacotes = new Pacotes();

        $solicitacoes = [];
        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $solicitacoes = $solicitacaoRetiradas->query()
            ->whereDate('updated_at', $data)
            ->get();

        $todosPacotes = $clsPacotes->query()
            ->get();

        foreach ($todosPacotes as $arg)
        {
            $pacotes[$arg->coleta][] = 'x';
        }

        return view('pages.conferente.solicitacoes.historico.historico-diario', compact('solicitacoes', 'pacotes', 'dia'));
    }

    public function info(Request $request, DestinatarioRecebedor $destinatarioRecebedor, PacotesHistoricos $pacotesHistoricos)
    {
        $pacote = Pacotes::find($request->id);

        $recebedor = [];
        $historicos = [];

        $dadosRecebedor = $destinatarioRecebedor->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosRecebedor as $value) {
            $recebedor[$value->meta_key] = $value->value;
        }

        $dadosHistoricos = $pacotesHistoricos->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosHistoricos as $value) {
            $historicos[] = [
                'status' => $value->status,
                'obs' => $value->value,
                'data' => $value->created_at
            ];
        }

        $frete = FretesRealizados::query()->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.conferente.pacotes.info-pacote', compact('pacote', 'recebedor', 'historicos', 'frete'));
    }
}
