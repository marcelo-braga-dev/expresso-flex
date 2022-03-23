<?php

namespace App\Http\Controllers\Entregadores\Pacotes;

use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;

class PacotesController
{
    public function show($id)
    {
        $recebedor = [];
        $historicos = [];

        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()->find($id);

        if (empty($pacote) || $pacote->entregador != id_usuario_atual()) {
            return redirect()->back();
        }

        $destinatarioRecebedor = new DestinatarioRecebedor();
        $dadosRecebedor = $destinatarioRecebedor->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosRecebedor as $value) {
            $recebedor[$value->meta_key] = $value->value;
        }

        $pacotesHistoricos = new PacotesHistoricos();
        $dadosHistoricos = $pacotesHistoricos->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosHistoricos as $value) {
            $historicos[] = [
                'status' => $value->status,
                'obs' => '',
                'data' => $value->created_at
            ];
        }

        $frete = FretesRealizados::query()->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.entregadores.pacotes.show', compact('pacote', 'historicos'));
    }
}
