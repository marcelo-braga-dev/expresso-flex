<?php
namespace App\Http\Controllers\Entregadores\QrCode;

use App\src\Coletas\Coleta;
use App\src\Coletas\Status\SolicitadoEntregador;
use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Coletado;
use App\src\Pacotes\Status\EntregaIniciado;
use App\src\QrCode\DecodeJson\DecodificarJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        exit('Abertura da camera para leitura de QrCode');
    }

    public function cadastrarPacote(Request $request)
    {
        $resposta = "Falha no cadastro do pacote!";

        try {
            $dados = (new DecodificarJson())->decodificar($request->json);
            $dados = array_merge($dados, ['coleta' => $request->coleta, 'entregador' => $request->entregador]);

            $pacote = new Pacote(new Coletado());
            if (is_int($pacote->coletar($dados))) $resposta = "Pacote cadastrado com sucesso!";
        } catch (\DomainException $e) {
            $resposta = $e->getMessage();
        }

        return ['resposta' => $resposta, 'nova_url_retorno' => ''];
    }

    public function novaColeta(Request $request)
    {
        $resposta = 'Nova Coleta cadastrada com sucesso!';
        $urlRetorno = '';

        try {
            $dados = (new DecodificarJson())->decodificar($request->json);

            if (empty($dados['origem']) || $dados['origem'] != 'ponto_coleta')
                throw new \DomainException('Não foi possível identificar o ponto de coleta.');

            $coleta = new Coleta(new SolicitadoEntregador($dados['id_ponto_coleta'], $request->entregador));
            $coleta = $coleta->criar();

            if (empty($coleta->id)) throw new \DomainException('Não foi possível cadastrar a coleta.');
            $urlRetorno = route('entregadores.coletas.pacotes.show', $coleta->id);
        } catch (\DomainException $e) {
            $resposta = $e->getMessage();
        }

        return ['resposta' => $resposta, 'nova_url_retorno' => $urlRetorno];
    }

    public function checkinPacote(Request $request)
    {
        $resposta = 'Checkin realizado com sucesso!';

        try {
            $dados = (new DecodificarJson())->decodificar($request->json);

            $pacote = new Pacote(new EntregaIniciado());
            $pacote->alterarStatus($dados, $request->user_id);
        } catch (\DomainException $e) {
            $resposta = $e->getMessage();
        }

        return ['resposta' => $resposta, 'nova_url_retorno' => ''];
    }

    public function identificarPacoteEntrega(Request $request)
    {
        $resposta = 'Pesquisa de pacote.';
        $urlRetorno = '';

        try {
            $dados = (new DecodificarJson())->decodificar($request->json);

            $origem = (new VerificarOrigemPacote())->verificarOrigem($dados);
            $pacote = $origem->getPacote($dados);

            if (empty($pacote->id)) {
                throw new \DomainException('Pacte não encontrado no sistema.');
            }

            $status = new EntregaIniciado();
            if ($pacote->status != $status->getStatus()) {
                throw new \DomainException('Pacote não cadastrado para entrega.');
            }

            $urlRetorno = route('entregadores.entregas.show',  $pacote->id);
        } catch (\DomainException $e) {
            $resposta = $e->getMessage();
        }

        return ['resposta' => $resposta, 'nova_url_retorno' => $urlRetorno];
    }
}
