<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Service\Pacotes\PacotesService;
use Illuminate\Http\Request;

class FinalizadaEntregasController extends Controller
{
    public function index(PacotesService $pacotesService)
    {
        $pacotes = $pacotesService->getPacotesEntrega('pacote_entrega_finalizado');        

        return view('pages.entregadores.entregas.finalizada-pacotes', compact('pacotes'));
    }

    public function finalizar(Request $request, PacotesService $pacotesService) 
    {
        $pacotesService->alteraStatusPacote($request->id, 'pacote_entregue');

        return redirect()->back();        
    }
}
