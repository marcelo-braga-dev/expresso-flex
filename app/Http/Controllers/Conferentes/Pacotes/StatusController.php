<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Models\Pacotes;
use App\Service\Entregadores\EntregadoresService;

class StatusController
{
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
