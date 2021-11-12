<?php

namespace App\Http\Controllers\Conferente\StatusPacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use Illuminate\Http\Request;

class PacotesSobEntregaController extends Controller
{
    public function index(Pacotes $Pacotes)
    {
        $entregadores = [];
        $date = date('Y-m-d') ;

        $pacotes = $Pacotes->query()
        ->whereDate('updated_at', '=',  $date)
        ->where('entregador', '!=', '')
        ->where('status', '=', 'pacote_entrega_destinatario')            
        ->orWhere('status', '=', 'pacote_entrega_iniciado')            
        ->orderBy('updated_at', 'DESC')
        ->get();

            foreach ($pacotes as $pacote)
            {
                $entregadores[$pacote->entregador]['id_entregador'] = $pacote->entregador;
                $entregadores[$pacote->entregador]['pacotes'][] = $pacote;
            }

        return view('pages.conferente.pacotes.sob-entrega', compact('entregadores'));
    }
}
