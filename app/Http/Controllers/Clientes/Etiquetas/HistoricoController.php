<?php

namespace App\Http\Controllers\Clientes\Etiquetas;

use App\Http\Controllers\Controller;
use App\Models\Etiquetas;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function index()
    {
        $datas = [];

        $etiquetas = Etiquetas::query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('id', 'DESC')
            ->get('created_at');

        foreach ($etiquetas as $etiqueta) {
            $time = strtotime($etiqueta->created_at);
            $mes = date('m', $time);
            $ano = date('Y', $time);

            $datas[$mes.$ano] = ['mes' => $mes, 'ano' => $ano];
        }

        return view('pages.clientes.etiquetas.historico.index', compact('datas'));
    }

    public function show(Request $request)
    {
        $etiquetas = Etiquetas::query()
            ->where('user_id', '=', id_usuario_atual())
            ->whereMonth('created_at', '=', $request->mes)
            ->whereYear('created_at', '=', $request->ano)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('pages.clientes.etiquetas.historico.show', compact('etiquetas'));
    }
}
