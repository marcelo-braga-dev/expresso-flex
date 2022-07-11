<?php

namespace App\Http\Controllers\Entregadores\Coletas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use App\src\Pacotes\Status\Base;
use App\src\Pacotes\Status\Coletado;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    // Historico de coletas
    public function historico()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoes = [];

        $_solicitacoes =
            $solicitacaoRetiradas
            ->where('entregador', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_solicitacoes as $arg) {
            $data = date('d/m/y', strtotime($arg->updated_at));

            $solicitacoes[$data][] = $arg->updated_at;
        }

        return view('pages.entregadores.coletas.historico.mes', compact('solicitacoes'));
    }

    // Historico de coletas
    public function historicoDia(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $solicitacoes = $solicitacaoRetiradas->query()
            ->where('entregador', '=', id_usuario_atual())
            ->whereDate('updated_at', $data)
            ->get();

        return view('pages.entregadores.coletas.historico.dia', compact('solicitacoes', 'dia'));
    }

    // Info Coleta
    public function info(Request $request)
    {
        $solicitacao = new SolicitacaoRetiradas();

        $coleta = $solicitacao->find($request->id);

        $pacotes = Pacotes::query()
            ->where('user_id', '=', $coleta->user_id)
            ->get();

        $statusFinalizado = (new Base())->getStatus();
        $statusColetado = (new Coletado())->getStatus();

        return view('pages.entregadores.coletas.historico.show',
            compact('coleta', 'pacotes', 'statusFinalizado', 'statusColetado'));
    }
}
