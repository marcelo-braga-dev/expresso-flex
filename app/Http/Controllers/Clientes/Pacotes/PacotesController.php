<?php

namespace App\Http\Controllers\Clientes\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;

class PacotesController extends Controller
{
    public function show($id)
    {
        $pacote = Pacotes::find($id);

        $recebedor = [];
        $historicos = [];

        if (empty($pacote) || $pacote->user_id != id_usuario_atual()) {
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
                'obs' => $value->value,
                'data' => $value->created_at
            ];
        }

        $frete = FretesRealizados::query()->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.clientes.pacotes.show', compact('pacote', 'recebedor', 'historicos', 'frete'));
    }
}
