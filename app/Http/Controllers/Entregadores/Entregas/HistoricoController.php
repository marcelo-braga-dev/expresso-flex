<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Models\Pacotes;
use App\src\Pacotes\Status\EntregaFinalizado;
use App\src\Pacotes\Status\EntregaIniciado;
use Illuminate\Http\Request;

class HistoricoController
{
    public function index()
    {
        $items = (new Pacotes())->query()
            ->where('entregador', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get(['updated_at', 'status']);

        $pacotes = [];
        foreach ($items as $item) {
            $data = date('d/m/y', strtotime($item->updated_at));
            if (in_array($item->status, statusPacotesEntrega())) {
                $pacotes[$data][] = $item->updated_at;
            }
        }

        return view('pages.entregadores.entregas.historico.index', compact('pacotes'));
    }

    public function show(Request $request)
    {
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = (new Pacotes())->query()
            ->where('entregador', '=', id_usuario_atual())
            ->whereDate('updated_at', $data)
            ->get();

        $statusIniciado = (new EntregaIniciado())->getStatus();
        $statusFinalizado = (new EntregaFinalizado())->getStatus();

        return view('pages.entregadores.entregas.historico.show',
            compact('pacotes', 'statusIniciado', 'statusFinalizado'));
    }
}
