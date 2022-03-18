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
        $coleta = new Coleta(new Aceito());
        $coleta->aceitar($request->id_loja);

        return redirect()->route('entregadores.coletas-abertas.index');
    }

    public function create()
    {
        $lojasClientes = new LojasClientes();

        $clientes = [];

        $lojas = $lojasClientes->query()
            ->where('status', '=', '1')
            ->get();

        foreach ($lojas as $loja) {
            $clientes[$loja->user_id]['user_id'] = $loja->user_id;

            $clientes[$loja->user_id]['lojas'][] = [
                'id' => $loja->id,
                'name' => $loja->nome
            ];
        }

        return view('pages.entregadores.coletas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $coleta = new Coleta(new Aceito());
        $coleta->aceitar($request->id);

        return redirect()->route('entregadores.coletas-abertas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $status = new Finalizado();

        $coleta = new SolicitacaoRetiradas();
        $coleta->aletarStatus($request->id_coleta, $status->getStatus());

        return redirect()->route('entregadores.coletas-abertas.index');
    }

    public function destroy($id)
    {
        //
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

    public function alterarStatus(Request $request)
    {
        //$solicitacao = new SolicitacaoRetiradas();
        //
        //$coleta = $solicitacao->find($request->id_coleta);
        //
        //if ($request->reabrir) {
        //    $coleta->update(['status' => 'coleta_aceita']);
        //} else {
        //    $coleta->update(['status' => 'coleta_realizada']);
        //    session()->flash('sucesso', 'Coleta finalizada com sucesso');
        //}
        //
        //return redirect()->route('entregadores.coletas.todas-coletas');
    }
}
