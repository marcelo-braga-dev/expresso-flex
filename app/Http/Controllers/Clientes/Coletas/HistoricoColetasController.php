<?php

namespace App\Http\Controllers\Clientes\Coletas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use Illuminate\Http\Request;

class HistoricoColetasController extends Controller
{
    public function index()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoes = [];

        $coletas = $solicitacaoRetiradas
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($coletas as $arg) {
            $data = date('m/y', strtotime($arg->updated_at));

            $solicitacoes[$data][] = $arg->updated_at;
        }

        return view('pages.clientes.coletas.historicos.index', compact('solicitacoes'));
    }

    public function mensal(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $mes = date('m', strtotime($request->data));
        $ano = date('Y', strtotime($request->data));

        $solicitacoes = $solicitacaoRetiradas->query()
            ->where('user_id', '=', id_usuario_atual())
            ->whereMonth('updated_at', $mes)
            ->whereYear('updated_at', $ano)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.clientes.coletas.historicos.mensal', compact('solicitacoes'));
    }

    public function diario(Request $request)
    {
        $clsPacotes = new Pacotes();

        $pacotes = $clsPacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->whereYear('updated_at', $request->ano)
            ->whereMonth('updated_at', $request->mes)
            ->whereDay('updated_at', $request->dia)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('pages.clientes.coletas.historicos.diario', compact('pacotes'));
    }
}
