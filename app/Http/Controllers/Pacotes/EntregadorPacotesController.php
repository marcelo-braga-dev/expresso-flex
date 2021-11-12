<?php

namespace App\Http\Controllers\Pacotes;

use App\Http\Controllers\Controller;
use App\Models\DestinatarioRecebedor;
use App\Models\FretesRealizados;
use App\Models\Pacotes;
use App\Models\PacotesHistoricos;
use App\Models\SolicitacaoRetiradas;
use App\Service\Pacotes\PacotesService;
use App\src\MercadoLivre\ServicesMercadoLivre;
use App\src\Pacotes\Pacote;
use Illuminate\Http\Request;

class EntregadorPacotesController extends Controller
{
    public function create(Request $request)
    {
        $pacote = new Pacote();

        $idColeta = $request->id_coleta;

        $idSeller = $request->id_seller;
        $entregador = $request->id_entregador;
        $codigo = $request->codigo ?: '';
        $origem = $request->origem;
        $endereco = $request->endereco;

        $entregador = id_usuario_atual();

        // Verifica origem Mercado Livre
        if ($request->origem == 'mercado_livre') {

            $recurso = new ServicesMercadoLivre();

            $solicitacao = SolicitacaoRetiradas::find($idColeta);

            $senderId = $request->sender_id;

            $idSeller = $request->id_seller;
            $codigo = $request->id ?: $request->codigo;

            $endereco = [];

            $endereco = $recurso->getEndereco($codigo, $senderId);

            if (empty($endereco)) {

                return redirect()->route(
                    'entregadores.pacotes.cadastrar-pacotes',
                    $idColeta
                );
            }

            $codigoRastreio = $pacote->criarPacote(
                $request,
                $idSeller,
                $origem,
                $endereco,
                'pacote_coletado',
                $solicitacao->loja,
                $entregador,
                $codigo,
                $idColeta,
            );
        }

        if ($request->origem == 'expresso_flex') {

            $pacote = Pacotes::find($request->id);

            $pacote->update(
                [
                    'coleta' => $request->id_coleta,
                    'entregador' => id_usuario_atual()
                ]
            );

            $pacotesService = new PacotesService(); 
            $pacotesService->alteraStatusPacote($pacote->id, 'pacote_coletado');

            $codigoRastreio = $pacote->rastreio;
        }

        return redirect()->route(
            'entregadores.pacotes.cadastrar-pacotes',
            [
                'idColeta' => $idColeta,
                'codigoRastreio' => $codigoRastreio
            ]
        );
    }

    // Pagina de cadastro de produtos
    public function cadastrarPacotes(string $idColeta)
    {
        $solicitacaoRetirada = new SolicitacaoRetiradas();
        $pacotes = new Pacotes();

        $entregadorResponsavel = id_usuario_atual();

        $solicitacao = $solicitacaoRetirada->query()
            ->where('id', '=', $idColeta)
            ->where('entregador', '=', $entregadorResponsavel)
            ->first();

        if (empty($solicitacao)) return redirect()->back()->with(['erro' => 'Ocorreu um erro.']);

        $pacotesCadastrados = $pacotes->query()
            ->where('user_id', '=', $solicitacao['user_id'])
            ->where('entregador', '=', $entregadorResponsavel)
            ->where('status', '=', 'pacote_coletado')
            ->where('coleta', '=', $idColeta)
            ->orderBy('id', 'DESC')
            ->get();

        return view(
            'pages.entregadores.coletas.cadastrar-pacotes',
            compact('solicitacao', 'pacotesCadastrados', 'idColeta')
        );
    }

    public function historico()
    {
        $Pacotes = new Pacotes();

        $pacotes = [];

        $_pacotes = $Pacotes->query()
            ->where('entregador', '=', id_usuario_atual())
            ->orderBy('updated_at', 'DESC')
            ->get();

        foreach ($_pacotes as $arg){
            $data = date('d/m/y', strtotime($arg->updated_at));
            
            $pacotes[$data][] = $arg->updated_at;
        }
        
        return view('pages.entregadores.pacotes.historico-pacotes', compact('pacotes'));
    }

    public function historicoDia(Request $request)
    {
        $Pacotes = new Pacotes();

        $pacotes = [];
        $dia = $request->data;

        $data = $request->data;
        $data = date('Y-m-d', strtotime($request->data));

        $pacotes = $Pacotes->query()
            ->where('entregador', '=', id_usuario_atual())
            ->whereDate('updated_at', $data)
            ->get();
        
        return view('pages.entregadores.pacotes.historico-dia-pacotes', compact('pacotes', 'dia'));
    }

    public function info(Request $request, DestinatarioRecebedor $destinatarioRecebedor, PacotesHistoricos $pacotesHistoricos)
    {
        $pacote = Pacotes::find($request->id);

        $recebedor = [];
        $historicos = [];

        if (empty($pacote) || $pacote->entregador != id_usuario_atual()) {
            return redirect()->back();
        }

        $dadosRecebedor = $destinatarioRecebedor->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosRecebedor as $value) {
            $recebedor[$value->meta_key] = $value->value;
        }

        $dadosHistoricos = $pacotesHistoricos->query()->where('pacotes_id', '=', $pacote->id)->get();

        foreach ($dadosHistoricos as $value) {
            $historicos[] = [
                'status' => $value->status,
                'obs' => $value->value,
                'data' => $value->created_at
            ];
        }

        $frete = FretesRealizados::query()->where('pacotes_id', '=', $pacote->id)->first();

        return view('pages.entregadores.pacotes.info-pacote', compact('pacote', 'recebedor', 'historicos', 'frete'));
    }
}
