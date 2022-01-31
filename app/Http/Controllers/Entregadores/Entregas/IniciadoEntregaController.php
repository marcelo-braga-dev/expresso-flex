<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Service\Pacotes\PacotesService;
use Illuminate\Http\Request;

class IniciadoEntregaController extends Controller
{
    public function index()
    {
        $pacotesService = new PacotesService();

        $pacotes = $pacotesService->getPacotesEntrega('pacote_entrega_iniciado');

        return view('pages.entregadores.entregas.para-entregar.index', compact('pacotes'));
    }

    public function info(Request $request)
    {
        $pacote = Pacotes::find($request->id);

        return view('pages.entregadores.entregas.para-entregar.info', compact('pacote'));
    }

    public function update(Request $request, PacotesService $pacotesService)
    {
        $pacotesService->alteraStatusPacote($request->id, 'pacote_entrega_destinatario');

        session()->flash('sucesso', 'Entrega Iniciada.');

        return redirect()->route('entregadores.entrega.em-andamento');
    }
}
