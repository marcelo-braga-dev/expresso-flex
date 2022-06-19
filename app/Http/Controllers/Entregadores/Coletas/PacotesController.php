<?php

namespace App\Http\Controllers\Entregadores\Coletas;

use App\Http\Controllers\Controller;
use App\Models\Pacotes;
use App\Models\SolicitacaoRetiradas;
use App\src\Pacotes\Status\Coletado;
use Illuminate\Http\Request;

class PacotesController extends Controller
{
    public function show(string $idColeta)
    {
        $solicitacaoRetirada = new SolicitacaoRetiradas();

        $status = new Coletado();

        $solicitacao = $solicitacaoRetirada->newQuery()
            ->where([
                ['id', '=', $idColeta],
                ['entregador', '=', id_usuario_atual()]
            ])->first();

        if (empty($solicitacao)) return redirect()->back()->with(['erro' => 'Ocorreu um erro.']);

        $pacotes = (new Pacotes())->newQuery()
            ->where([
                ['entregador', '=', id_usuario_atual()],
                ['status', '=', $status->getStatus()],
                ['coleta', '=', $idColeta]
            ])
            ->orderBy('id', 'DESC')
            ->get();

        return view(
            'pages.entregadores.coletas.pacotes.show',
            compact('solicitacao', 'pacotes', 'idColeta')
        );
    }
}
