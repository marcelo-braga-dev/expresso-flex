<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote;

use App\src\Integracoes\MercadoLivre\Recursos\DadosEnvio;
use App\src\Integracoes\MercadoLivre\Requisicoes\DadosRequisicao;
use App\src\Pacotes\CodigoRastreio;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\NovoPacote;
use App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos\DadosPacote;
use App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos\EnderecoDestinatario;
use App\src\Pacotes\Status\Coletado;

class CadastrarPacote
{
    public function cadastrar($dados, $origem)
    {
        $dadosRequisicao = new DadosRequisicao();
        $dadosRequisicao->codigo = $dados['id'];
        $dadosRequisicao->senderId = $dados['sender_id'];

        // Coleta
        $coleta = new Coleta($dados['coleta'], $dados['entregador'], new Coletado());

        // Destinatario
        $dadosDestinatario = (new DadosEnvio())->executar($dadosRequisicao);
        $destinatario = $this->setDestinatario($dadosDestinatario);

        // Pacote
        $dadosPacote = new DadosPacote($dados['id'], $this->getCodigoRastreio(), $origem);

        $pacote = new NovoPacote($coleta, $destinatario, $dadosPacote);
        return $pacote->cadastrar();
    }

    private function setDestinatario($receiver_address)
    {
        $destinatario = new Destinatario();

        $cadastrarDestinatario = new CadastrarDestinatario(
            $receiver_address['receiver_address']['receiver_name'],
            $receiver_address['receiver_address']['receiver_phone'], null);

        $destinatario->setIdEndereco($this->getEndereco($receiver_address));
        $destinatario->setId($cadastrarDestinatario->cadastrar());

        return $destinatario;
    }

    private function getEndereco($dadosDestinatario): Endereco
    {
        $enderecoDestinatario = new EnderecoDestinatario($dadosDestinatario);

        return $enderecoDestinatario->getEndereco();
    }

    private function getCodigoRastreio(): string
    {
        $codigoRastreio = new CodigoRastreio();

        return $codigoRastreio->gerar();
    }
}
