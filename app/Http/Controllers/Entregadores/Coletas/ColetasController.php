<?php

namespace App\Http\Controllers\Entregadores\Coletas;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use App\Models\SolicitacaoRetiradas;
use App\src\Coletas\Coleta;
use App\src\Coletas\Status\Aceito;
use App\src\Coletas\Status\Finalizado;
use Illuminate\Http\Request;

class ColetasController extends Controller
{
    public function index(Request $request)
    {
        $status = new Aceito();
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoesAceitas = $solicitacaoRetiradas
            ->where('entregador', '=', id_usuario_atual())
            ->where('status', '=', $status->getStatus())
            ->orderBy('id', 'DESC')
            ->get();

        return view(
            'pages.entregadores.coletas.index',
            compact('solicitacoesAceitas')//, 'coletasParaAceitar'
        );
    }

    public function create()
    {
        $lojasClientes = new LojasClientes();

        $clientes = $lojasClientes->query()
            ->where('status', '=', '1')
            ->orderBy('nome')
            ->get();

        return view('pages.entregadores.coletas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $coleta = new Coleta(new Aceito());
        $coleta->aceitar($request->id);

        return redirect()->route('entregadores.coletas.index');
    }

    public function update(Request $request)
    {
        $status = new Finalizado();

        $coleta = new SolicitacaoRetiradas();
        $coleta->aletarStatus($request->id_coleta, $status->getStatus());

        modalSucesso('Coleta finalizada com sucesso.');
        return redirect()->route('entregadores.coletas.index');
    }

    // Cancelar coleta
    public function cancelarColeta(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacao = $solicitacaoRetiradas->find($request->id_coleta);

        $solicitacao->entregador = null;
        $solicitacao->status = 'coleta_cancelada_entregador';
        $solicitacao->texto = $request->motivo_cancelamento;

        $solicitacao->push();

        session()->flash('sucesso', 'Coleta cancelada com sucesso');

        return redirect()->back();
    }
}
