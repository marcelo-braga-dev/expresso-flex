<?php

namespace App\Http\Controllers\Entregadores\Coleta;

use App\Models\LojasClientes;
use App\Models\RegioesEntregadores;
use App\Models\SolicitacaoRetiradas;
use App\Service\ColetaService;
use App\src\Coletas\Status\Aceito;
use Illuminate\Http\Request;

class ColetasController
{
    public function index()
    {
        $solicitacoesAceitas = $this->coletasAceitas();

        $coletasParaAceitar = $this->getTodasSolicitacoes();

        return view(
            'pages.entregadores.coletas.todas-coletas',
            compact('solicitacoesAceitas', 'coletasParaAceitar')
        );
    }

    // Mostra todas as coletas pra aceitar
    public function coletasDisponiveis()
    {
        $todasSolicitacoes = $this->getTodasSolicitacoes();

        // return view('pages.entregadores.coletas.solicitacao-aberto', compact('todasSolicitacoes'));
    }

    // Pega todas as solicitacoes
    public function getTodasSolicitacoes(): array
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();
        $entregadores = new RegioesEntregadores();

        $todasSolicitacoes = [];
        $countColetas = 0;

        $areasAtuacao = $entregadores->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('meta_key', '=', 'regiao_coleta')
            ->get('value');

        foreach ($areasAtuacao as $regiaoEntregador) {

            $cepMin = str_pad($regiaoEntregador['value'], 8, '0');
            $cepMax = str_pad($regiaoEntregador['value'], 8, '9');

            $coletas = $solicitacaoRetiradas->query()
                ->where('cep', '>=', $cepMin)
                ->where('cep', '<=', $cepMax)
                ->where('status', '=', 'coleta_solicitada')
                ->get(['id', 'cep', 'user_id', 'loja'])
                ->toArray();

            $countColetas += count($coletas);

            if (count($coletas)) {
                $todasSolicitacoes[] =
                    [
                        'regiao' => $regiaoEntregador['value'],
                        'coletas' => $coletas
                    ];
            }
        }

        return ['solicitacoes' => $todasSolicitacoes, 'count' => $countColetas];
    }

    // Aceita a realizacao da coleta
    public function aceitarColeta(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $idColeta = $request->id_coleta;
        $idEntregador = id_usuario_atual();

        $solicitacao = $solicitacaoRetiradas->find($idColeta);
        $status = new Aceito();
        $solicitacao->update(
            [
                'entregador' => $idEntregador,
                'status' => $status->getStatus()
            ]
        );


        session()->flash('sucesso', 'Coleta aceita com sucesso');

        return redirect()->back();
    }

    // Mostra pagina de cadastro de pacotes
    public function coletasAceitas()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $idUsuario = id_usuario_atual();

        $status = new Aceito();

        return $solicitacaoRetiradas
            ->where('entregador', '=', $idUsuario)
            ->where('status', '=', $status->getStatus())
            ->orderBy('cep', 'ASC')
            ->get()
            ->toArray();

        //view('pages.entregadores.coletas.coletas-aceita', compact('solicitacoesAceitas'));
    }



    // Finalizar ordem de coleta
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

    public function criarColeta()
    {
        //$lojasClientes = new LojasClientes();
        //
        //$clientes = [];
        //
        //$_lojas = $lojasClientes->query()
        //    ->where('status', '=', '1')
        //    ->get();
        //
        //foreach ($_lojas as $loja) {
        //    $clientes[$loja->user_id]['user_id'] = $loja->user_id;
        //
        //    $clientes[$loja->user_id]['lojas'][] = [
        //        'id' => $loja->id,
        //        'nome' => $loja->nome
        //    ];
        //}
        //
        //return view('pages.entregadores.coletas.nova-coleta', compact('clientes'));
    }

    public function salvarNovaColeta(Request $request)
    {
        //$coletaService = new ColetaService();
        //
        //$coletaService->criarColetaComEntregador($request->id);
        //
        //return redirect()->route('entregadores.coletas.todas-coletas');
    }
}
