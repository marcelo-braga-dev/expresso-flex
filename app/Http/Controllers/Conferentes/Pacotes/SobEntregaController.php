<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Models\Pacotes;
use App\src\Pacotes\Status\EntregaIniciado;

class SobEntregaController
{
    public function index()
    {
        $status = new EntregaIniciado();
        $data = date('Y-m-d');

        $pacotes = (new Pacotes())->newQuery()
            ->where('entregador', '!=', '')
            ->where('status', '=', $status->getStatus())
            ->whereDate('updated_at', '=', $data)
            ->orderBy('updated_at', 'DESC')
            ->get(['id', 'entregador']);

        $entregadores = [];
        foreach ($pacotes as $item) {
            $entregadores[$item->entregador][] = $item->entregador;
        }

        return view('pages.conferente.pacotes.sob-entrega.index', compact('entregadores'));
    }

    public function show($id)
    {
        $status = new EntregaIniciado();
        $data = date('Y-m-d');
        $pacotes = (new Pacotes())->newQuery()
            ->where('entregador', '=', $id)
            ->where('status', '=', $status->getStatus())
            ->whereDate('updated_at', '=', $data)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.conferente.pacotes.sob-entrega.show', compact('pacotes'));
    }
}
