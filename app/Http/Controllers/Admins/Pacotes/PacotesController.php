<?php

namespace App\Http\Controllers\Admins\Pacotes;

use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;

class PacotesController
{
    public function show($id)
    {
        $destinatarioRecebedor = new DestinatarioRecebedor;
        $pacotesHistoricos = new PacotesHistoricos;
        $pacote = Pacotes::find($id);

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

        return view('pages.admin.pacotes.info-pacote', compact('pacote', 'recebedor', 'historicos', 'frete'));
    }
}
