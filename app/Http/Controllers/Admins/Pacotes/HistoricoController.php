<?php

namespace App\Http\Controllers\Admins\Pacotes;

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

        return view('pages.admin.pacotes.historico', compact('pacotes'));
    }

    public function diario(Request $request)
    {
        $Pacotes = new Pacotes();

        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = $Pacotes->query()
            ->where('status', '!=', 'pacote_nova_etiqueta')
            ->whereDate('updated_at', $data)
            ->get();

        return view('pages.admin.pacotes.historico-diario', compact('pacotes', 'dia'));
    }

    public function info(Request $request)
    {

    }
}

