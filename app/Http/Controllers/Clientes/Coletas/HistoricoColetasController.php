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

        $coletas = $solicitacaoRetiradas->newQuery()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($coletas as $arg) {
            $data = date('m/y', strtotime($arg->created_at));

            $solicitacoes[$data][] = $arg->created_at;
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
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.clientes.coletas.historicos.mensal', compact('solicitacoes'));
    }

    public function diario(Request $request)
    {
        $clsPacotes = new Pacotes();

        $pacotes = $clsPacotes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('coleta', '=', $request->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.clientes.coletas.historicos.diario', compact('pacotes'));
    }
}
