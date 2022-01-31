<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Models\SolicitacaoRetiradas;
use App\Service\Lojas\LojasService;
use App\src\Coletas\Status\Aceito;
use Illuminate\Http\Request;

class ColetaController extends Controller
{
    // Solicitar ou cancelar a coleta
    public function solicitarColeta()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();
        $lojasService = new LojasService();

        $solicitacoes = $solicitacaoRetiradas->query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('id', 'DESC')
            ->limit(1)
            ->get();

        $pontosColeta = $lojasService->getLojasCliente(id_usuario_atual());

        $limite = $this->limiteHorarioColeta();

        $data = date('d-m-y', strtotime($solicitacoes[0]['updated_at']));
        $hoje = date('d-m-y');

        $status = new Aceito();
        if (
            $solicitacoes->isEmpty() ||
            $solicitacoes[0]['status'] != 'coleta_solicitada' &&
            $solicitacoes[0]['status'] != $status->getStatus() ||
            $hoje != $data
        ) {
            return view(
                'pages.cliente.coletas.solicitar-coleta',
                compact('solicitacoes', 'pontosColeta', 'limite')
            );
        }

        return view('pages.cliente.coletas.cancelar-coleta', compact('solicitacoes'));
    }

    public function store(Request $request)
    {
        // Verifica se o horaio limite foi atingido
        $limite = $this->limiteHorarioColeta();

        if ($limite['bloqueio']) {
            session()
                ->flash('erro', "Não é possível realizar chamado de coleta depois das {$limite['horario']}.");
            return redirect()->back();
        }

        $solicitarRetirada = new SolicitacaoRetiradas();

        $idUsuario = id_usuario_atual();
        $idLoja = $request->loja;
        $cep = get_loja($idLoja, $idUsuario)->cep;

        $solicitarRetirada->create(
            [
                'user_id' => $idUsuario,
                'cep' => $cep,
                'loja' => $idLoja,
                'status' => 'coleta_solicitada'
            ]
        );


        $request->session()->flash('sucesso', 'Solicitação de coleta realizada com sucesso.');

        return redirect()->back();
    }

    public function cancelarColeta(Request $request)
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoes = $solicitacaoRetiradas::query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('id', 'DESC')
            ->first();

        $solicitacoes = SolicitacaoRetiradas::find($solicitacoes->id);

        $solicitacoes->status = 'coleta_cancelada_cliente';
        $solicitacoes->texto = $request->motivo_cancelamento;

        $solicitacoes->push();

        $request->session()->flash('sucesso', 'Solicitação cancelada com sucesso.');

        return redirect()->back();
    }

    public function historico()
    {
        $solicitacaoRetiradas = new SolicitacaoRetiradas();

        $solicitacoes = $solicitacaoRetiradas->query()
            ->where('user_id', '=', id_usuario_atual())
            ->orderBy('id', 'DESC')
            ->get();

        return view('pages.cliente.coletas.historico-coletas', compact('solicitacoes'));
    }

    private function limiteHorarioColeta()
    {
        $meta = Meta::find(7);
        $limite = $meta->values
            ->where('meta_key', '=', 'horario_limite')
            ->first();

        $bloqueio = time() > strtotime($limite->value) ? true : false;

        return ['horario' => $limite->value, 'bloqueio' => $bloqueio];
    }
}
