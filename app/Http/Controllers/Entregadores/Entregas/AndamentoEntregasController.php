<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\Pacotes;
use App\Service\Pacotes\PacotesService;
use Illuminate\Http\Request;

class AndamentoEntregasController extends Controller
{
    // public function index(PacotesService $pacotesService)
    // {
    //     $pacotes = $pacotesService->getPacotesEntrega('pacote_entrega_destinatario');

    //     return view('pages.entregadores.entregas.andamento-entregas', compact('pacotes'));
    // }

    public function info(Request $request, Pacotes $classPacotes)
    {
        $pacote = $classPacotes->find($request->id);

        return view('pages.entregadores.entregas.finalizar-entrega', compact('pacote'));
    }

    public function infoQrCode(Request $request, PacotesService $pacotesService)
    {
        $pacote = $pacote = $pacotesService->pacoteQrCode($request->id, $request->origem);;

        return view('pages.entregadores.entregas.finalizar-entrega', compact('pacote'));
    }

    public function update(Request $request, PacotesService $pacotesService)
    {
        $destinatario = new DestinatarioRecebedor();

        $destinatario->updateOrInsert(
            ['meta_key' => 'recebedor', 'pacotes_id' => $request->id],
            ['value' => $request->recebedor]
        );

        $destinatario->updateOrInsert(
            ['meta_key' => 'nome_recebedor', 'pacotes_id' => $request->id],
            ['value' => $request->nome_recebedor]
        );

        $destinatario->updateOrInsert(
            ['meta_key' => 'documento_recebedor', 'pacotes_id' => $request->id],
            ['value' => $request->documento_recebedor]
        );

        $destinatario->updateOrInsert(
            ['meta_key' => 'observacoes', 'pacotes_id' => $request->id],
            ['value' => $request->observacoes]
        );

        session()->flash('sucesso', 'Entrega Finalizada.');

        $pacotesService->alteraStatusPacote($request->id, 'pacote_entrega_finalizado');

        return redirect()->route('entregadores.entrega.entrega-iniciadas');
    }

    // public function cancel(Request $request)
    // {
    //     $pacote = Pacotes::find($request->id);

    //     if ($request->motivo_cancelamento == 'entregador_cancelou') {
    //         $pacote->update(['texto' => $request->texto_cancelamento]);

    //         $pacotesService = new PacotesService();
    //         $pacotesService->alteraStatusPacote($pacote->id, 'pacote_cancelado_entregador');
    //     }

    //     return redirect()->back();
    // }
}
