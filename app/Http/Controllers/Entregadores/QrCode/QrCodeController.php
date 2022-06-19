<?php
namespace App\Http\Controllers\Entregadores\QrCode;

use App\src\Coletas\Coleta;
use App\src\Coletas\Status\SolicitadoEntregador;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Coletado;
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
        $resposta = "Pacote cadastrado com sucesso!";

        try {
            $dados = (new DecodificarJson())->decodificar($request->json);
            $dados = array_merge($dados, ['coleta' => $request->coleta, 'entregador' => $request->entregador]);

            $pacote = new Pacote(new Coletado());
            $pacote->coletar($dados);
        } catch (\DomainException $e) {
            $resposta = $e->getMessage();
        }

        return ['resposta' => $resposta];
    }

    public function novaColeta(Request $request)
    {
        $resposta = 'Nova Coleta cadastrada com sucesso!';

        try {
            $dados = (new DecodificarJson())->decodificar($request->json);

            if (empty($dados['origem']) || $dados['origem'] != 'ponto_coleta')
                throw new \DomainException('Não foi possível identificar o ponto de coleta.');

            $coleta = new Coleta(new SolicitadoEntregador($dados['id_ponto_coleta'], $request->entregador));
            $coleta->criar();

        } catch (\DomainException $e) {
            $resposta = $e->getMessage();
        }

        return ['resposta' => $resposta];
    }
}
