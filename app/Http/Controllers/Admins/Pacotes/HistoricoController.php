<?php

namespace App\Http\Controllers\Admins\Pacotes;

use App\Models\Pacotes;
use Illuminate\Http\Request;

class HistoricoController
{
    public function index()
    {
        $items = (new Pacotes())->newQuery()
            ->orderBy('updated_at', 'DESC')
            ->get();

        $pacotes = [];
        foreach ($items as $item) {
            $data = date('d/m/y', strtotime($item->updated_at));

            $pacotes[$data][] = $item->updated_at;
        }

        return view('pages.admins.pacotes.historicos.index', compact('pacotes'));
    }

    public function diario(Request $request)
    {
        $dia = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = (new Pacotes())->newQuery()
            ->whereDate('updated_at', $data)
            ->get();

        return view('pages.admins.pacotes.historicos.show', compact('pacotes', 'dia'));
    }
}

