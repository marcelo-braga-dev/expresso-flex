<?php

namespace App\Http\Controllers\Entregadores\Entregas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Service\Pacotes\PacotesService;
use Illuminate\Http\Request;

class CadastrarPacotesController extends Controller
{    
    public function index()
    {
        $pacotesService = new PacotesService();

        // $pacotesService->getPacotesEntrega('pacote_base');
        
        // return redirect()->route('entregadores.entrega.entrega-iniciadas');

        $pacotes = $pacotesService->getPacotesEntrega('pacote_entrega_iniciado');

        return view('pages.entregadores.entregas.para-entregar.index', compact('pacotes'));
    }

    public function update(Request $request, PacotesService $pacotesService)
    {        
        $erro = false;
       
        $pacote = $pacotesService->pacoteQrCode($request->id, $request->origem);

        if (empty($pacote->status)) {
            session()->flash('erro', 'Pacote não encontrado.');
            
            return redirect()->route('entregadores.entrega.cadastrar-pacotes');
        }

        if ($pacote->status == 'pacote_entrega_iniciado' && !$erro) {
            session()->flash('erro', 'Pacote já cadastrado para entrega.');
            $erro = true;
        }

        if ($pacote->status != 'pacote_base' && !$erro) {
            $status = get_status_pacote($pacote->status);
            session()->flash('erro', 
            "O pacote precisa estar cadastrado na base de distribuição.
            Status atual do pacote: $status");
            $erro = true;
        }

        if (!$erro) {
            $pacotesService->alteraStatusPacote($pacote->id, 'pacote_entrega_iniciado');
            session()->flash('sucesso', 'Pacote cadastrado para entrega com sucesso.');
        }        
        
        return redirect()->route('entregadores.entrega.cadastrar-pacotes');        
    }
}
