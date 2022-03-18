<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use Illuminate\Http\Request;

class HistoricoController
{
    public function index()
    {
        $Pacotes = new Pacotes();

        $pacotes = [];

        $_pacotes = $Pacotes->query()
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg) {
            $data = date('d/m/y', strtotime($arg->updated_at));

            $pacotes[$data][] = $arg->updated_at;
        }

        return view('pages.conferente.pacotes.historico.historico-pacotes', compact('pacotes'));
    }

    public function historicoDiario(Request $request)
    {
        $Pacotes = new Pacotes();

        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = $Pacotes->query()
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->whereDate('updated_at', $data)
            ->get();

        return view('pages.conferente.pacotes.historico.historico-diario', compact('pacotes', 'dia'));
    }

    public function show(Request $request, DestinatarioRecebedor $destinatarioRecebedor, PacotesHistoricos $pacotesHistoricos)
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
