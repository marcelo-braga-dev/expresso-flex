<?php

namespace App\Http\Controllers\Entregadores\Pacotes;

use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use App\Models\SolicitacaoRetiradas;

class PacotesController
{
    public function show($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        if (empty($pacote) || $pacote->entregador != id_usuario_atual()) {
            return redirect()->back();
        }

        $destinatarioRecebedor = new DestinatarioRecebedor();
        $recebedor = $destinatarioRecebedor->newQuery()
            ->where('pacotes_id', '=', $pacote->id)
            ->first();

        $pacotesHistoricos = new PacotesHistoricos();
        $dadosHistoricos = $pacotesHistoricos->query()->where('pacotes_id', '=', $pacote->id)->get();

        $historicos = [];
        foreach ($dadosHistoricos as $value) {
            $historicos[] = [
                'status' => $value->status,
                'obs' => '',
                'data' => $value->created_at
            ];
        }

        $loja = (new SolicitacaoRetiradas())->newQuery()
            ->find($pacote->coleta, 'loja');
        $loja = $loja->loja;

        $frete = FretesRealizados::query()->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.entregadores.pacotes.show',
            compact('pacote', 'historicos', 'recebedor', 'loja'));
    }
}
