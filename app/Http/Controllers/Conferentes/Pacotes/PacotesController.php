<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;

class PacotesController
{
    public function show($id)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()
            ->findOrFail($id);

        $recebedor = [];
        $historicos = [];

        $destinatarioRecebedor = new DestinatarioRecebedor();
        $dadosRecebedor = $destinatarioRecebedor->newQuery()
            ->where('pacotes_id', '=', $pacote->id)
            ->get();

        foreach ($dadosRecebedor as $value) {
            $recebedor[$value->meta_key] = $value->value;
        }

        $pacotesHistoricos = new PacotesHistoricos();
        $dadosHistoricos = $pacotesHistoricos->newQuery()
            ->where('pacotes_id', '=', $pacote->id)
            ->get();

        foreach ($dadosHistoricos as $value) {
            $historicos[] = [
                'status' => $value->status,
                'obs' => $value->value,
                'data' => $value->created_at
            ];
        }

        $freteRealizados = new FretesRealizados();
        $frete = $freteRealizados->newQuery()
            ->where('pacotes_id', '=', $pacote->id)
            ->first();


        return view('pages.conferente.pacotes.show',
            compact('pacote','recebedor', 'historicos', 'frete'));

    }
}
