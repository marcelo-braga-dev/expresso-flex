<?php

namespace App\Http\Controllers\Entregadores\Historicos;

use App\Models\Pacotes;
use App\src\Pacotes\Status\EntregaFinalizado;

class EntregasFinalizadasController
{
    public function index()
    {
        $status = new EntregaFinalizado();

        $pacotes = (new Pacotes())->newQuery()
            ->where('entregador', '=', id_usuario_atual())
            ->where('status', '=', $status->getStatus())
            ->orderBy('updated_at', 'DESC')
            ->paginate();

        return view('pages.entregadores.entregas.finalizadas.index', compact('pacotes'));
    }
}
