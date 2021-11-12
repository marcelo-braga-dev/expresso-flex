<?php

namespace App\Http\Controllers\Entregadores;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Service\Pacotes\PacotesService;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function cancel(Request $request, Pacotes $pacotes)
    {
        $pacote = $pacotes->find($request->id);
        
        return view('pages.entregadores.entregas.cancelar-entrega', compact('pacote'));
    }

    public function cancelStore(Request $request)
    {
        $pacote = Pacotes::find($request->id);

        if ($request->motivo_cancelamento == 'entregador_cancelou') {
            $pacote->update(['texto' => $request->texto_cancelamento]);

            $pacotesService = new PacotesService();
            $pacotesService->alteraStatusPacote($pacote->id, 'pacote_cancelado_entregador');
        }

        return redirect()->route('entregadores.entrega.entrega-iniciadas');
    }
}
