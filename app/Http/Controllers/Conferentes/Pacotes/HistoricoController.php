<?php

namespace App\Http\Controllers\Conferentes\Pacotes;

use App\Models\Pacotes;
use Illuminate\Http\Request;

class HistoricoController
{
    public function index()
    {
        $Pacotes = new Pacotes();

        $pacotes = [];

        $_pacotes = $Pacotes->query()
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg) {
            $data = date('d/m/y', strtotime($arg->updated_at));

            $pacotes[$data][] = $arg->updated_at;
        }

        return view('pages.conferente.pacotes.historico.historico-pacotes', compact('pacotes'));
    }

    public function historicoDiario(Request $request)
    {
        $dia = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $Pacotes = new Pacotes();
        $pacotes = $Pacotes->query()
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->whereDate('updated_at', $data)
            ->get();

        return view('pages.conferente.pacotes.historico.historico-diario', compact('pacotes', 'dia'));
    }
}
