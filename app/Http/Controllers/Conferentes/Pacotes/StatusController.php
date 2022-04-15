<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Models\Pacotes;
use App\Service\Entregadores\EntregadoresService;

class StatusController
{
    public function sobColeta()
    {
        $Pacotes = new Pacotes();

        $entregadores = [];
        $date = date('Y-m-d');

        $pacotes = $Pacotes->query()
            //->whereDate('updated_at', '=',  $date)
            ->where('entregador', '!=', '')
            ->where('status', '=', 'pacote_coletado')
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($pacotes as $pacote) {
            $entregadores[$pacote->entregador]['id_entregador'] = $pacote->entregador;
            $entregadores[$pacote->entregador]['pacotes'][] = $pacote;
            //$entregadores[$pacote->entregador]['data'] = $pacote->updated_at;
        }

        return view('pages.conferente.pacotes.sob-coleta', compact('entregadores'));
    }

    public function sobEntrega(Pacotes $Pacotes)
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

    public function naBase()
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
}
