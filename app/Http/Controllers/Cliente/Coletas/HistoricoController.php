<?php

namespace App\Http\Controllers\Cliente\Coletas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function historicoMeses()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoes = [];

        $_solicitacoes = $solicitacaoRetiradas
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_solicitacoes as $arg) {
            $data = date('m/y', strtotime($arg->updated_at));

            $solicitacoes[$data][] = $arg->updated_at;
        }

        return view('pages.cliente.coletas.historico.meses', compact('solicitacoes'));
    }

    // Historico de coletas
    public function historicoDias(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $pacotes = [];
        
        $mes = date('m', strtotime($request->data));
        $ano = date('Y', strtotime($request->data));

        $solicitacoes = $solicitacaoRetiradas->query()
            ->where('user_id', '=', id_usuario_atual())
            ->whereMonth('updated_at', $mes)
            ->whereYear('updated_at', $ano)
            ->orderBy('updated_at', 'DESC')
            ->get();
            
        return view('pages.cliente.coletas.historico.dias', compact('solicitacoes'));
    }

    public function historicoPacotesColetadosDia(Request $request)
    {
        $clsPacotes = new Pacotes();


        $pacotes = $clsPacotes->query()
        ->where('user_id', '=', id_usuario_atual())
        ->whereYear('updated_at', $request->ano)
        ->whereMonth('updated_at', $request->mes)
        ->whereDay('updated_at', $request->dia)
        ->orderBy('updated_at', 'DESC')
        ->get();
        
        return view('pages.cliente.coletas.historico.pacotes-coletados-dia', compact('pacotes'));
    }
}
