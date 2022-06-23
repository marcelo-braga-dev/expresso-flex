<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;

class PorClientesController extends Controller
{
    public function index()
    {
        $data = date('Y-m-d');

        $pacotes = (new Pacotes())->newQuery()
            ->whereDate('updated_at', '=', $data)
            ->orderBy('updated_at', 'DESC')
            ->get(['id', 'user_id']);

        $clientes = [];
        foreach ($pacotes as $item) {
            $clientes[$item->user_id][] = $item->user_id;
        }

        return view('pages.conferente.pacotes.por-cliente.index', compact('clientes'));
    }

    public function show($id)
    {
        $data = date('Y-m-d');

        $pacotes = (new Pacotes())->newQuery()
            ->where('user_id', '=', $id)
            ->whereDate('updated_at', '=', $data)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.conferente.pacotes.por-cliente.show', compact('pacotes'));
    }
}
