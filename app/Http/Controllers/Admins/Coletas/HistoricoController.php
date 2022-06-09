<?php

namespace App\Http\Controllers\Admins\Coletas;

use App\Models\MetaValues;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use Illuminate\Http\Request;

class HistoricoController
{
    public function index()
    {
        $items = (new SolicitacaoRetiradas())->newQuery()
                ->orderBy('updated_at', 'DESC')
                ->get();

        $solicitacoes = [];
        foreach ($items as $item) {
            $data = date('d/m/y', strtotime($item->updated_at));

            $solicitacoes[$data][] = $item->updated_at;
        }

        return view('pages.admins.coletas.index', compact('solicitacoes'));
    }

    public function historicoPacotesColetadosDia(Request $request)
    {
        $pacotes = (new Pacotes())->newQuery()
            ->where('coleta', '=', $request->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.admins.coletas.show', compact('pacotes'));
    }

    // Historico de coletas
    public function historicoDiario(Request $request)
    {
        $dia = $request->data;

        $data = date('Y-m-d', strtotime($request->data));

        $solicitacoes = (new SolicitacaoRetiradas())->newQuery()
            ->whereDate('updated_at', $data)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.admins.coletas.dia', compact('solicitacoes', 'dia'));
    }

    public function update(Request $request, MetaValues $metaValues)
    {
        if (!empty($request->horario_limite_coleta)) {

            $metaValues->updateOrInsert(
                ['meta_key' => 'horario_limite', 'meta_id' => 7],
                ['value' => $request->horario_limite_coleta]
            );

            session()->flash('sucesso', 'Informação atualizada com sucesso.');
        }

        return redirect()->back();
    }
}
