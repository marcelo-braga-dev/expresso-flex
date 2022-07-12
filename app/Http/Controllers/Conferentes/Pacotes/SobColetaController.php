<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\src\Pacotes\Status\Coletado;

class SobColetaController extends Controller
{
    public function index()
    {
        $status = new Coletado();

        $pacotes = (new Pacotes())->newQuery()
            ->where('entregador', '!=', '')
            ->where('status', '=', $status->getStatus())
            ->orderBy('updated_at', 'DESC')
            ->get(['id', 'entregador']);

        $entregadores = [];
        foreach ($pacotes as $item) {
            $entregadores[$item->entregador][] = $item->entregador;
        }

        return view('pages.conferente.pacotes.sob-coleta.index', compact('entregadores'));
    }

    public function show($id)
    {
        $status = new Coletado();

        $pacotes = (new Pacotes())->newQuery()
            ->where('entregador', '=', $id)
            ->where('status', '=', $status->getStatus())
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.conferente.pacotes.sob-coleta.show', compact('id', 'pacotes'));
    }
}
