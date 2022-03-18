<?php

namespace App\Http\Controllers\Entregadores\Pacotes;

use App\Models\Pacotes;
use Illuminate\Http\Request;

class HistoricoController
{
    public function historico()
    {
        $Pacotes = new Pacotes();

        $pacotes = [];

        $_pacotes = $Pacotes->query()
            ->where('entregador', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg){
            $data = date('d/m/y', strtotime($arg->updated_at));

            $pacotes[$data][] = $arg->updated_at;
        }

        return view('pages.entregadores.pacotes.historico-pacotes', compact('pacotes'));
    }

    public function historicoDia(Request $request)
    {
        $Pacotes = new Pacotes();

        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = $Pacotes->query()
            ->where('entregador', '=', id_usuario_atual())
            ->whereDate('updated_at', $data)
            ->get();

        return view('pages.entregadores.pacotes.historico-dia-pacotes', compact('pacotes', 'dia'));
    }
}
