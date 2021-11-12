<?php

namespace App\Http\Controllers\Conferente\StatusPacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Service\Entregadores\EntregadoresService;
use Illuminate\Http\Request;

class PacotesNaBaseController extends Controller
{
    public function index()
    {
        $pacotes = new Pacotes();
        $entregadoresService = new EntregadoresService();

        $pacotes = $pacotes->query()
            ->where('status', '=', 'pacote_base')
            ->orderBy('id', 'DESC')
            ->get();

        $entregadores = $entregadoresService->getEntregadores();

        return view('pages.conferente.pacotes.pacotes-base', compact('pacotes', 'entregadores'));
    }

    public function alterarEntregador(Request $request)
    {
        $pacote = Pacotes::find($request->id);

        $pacote->update(['entregador' => $request->id_entregador]);

        return redirect()->back();
    }
}
