<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote;

use App\src\Integracoes\MercadoLivre\Recursos\DadosEnvio;
use App\src\Integracoes\MercadoLivre\Requisicoes\DadosRequisicao;
use App\src\Pacotes\CodigoRastreio;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos\EnderecoDestinatario;
use App\src\Pacotes\Status\Coletado;

class CadastrarPacote
{
    public function cadastrar($dados, $origem)
    {
        $dadosRequisicao = new DadosRequisicao();
        $dadosRequisicao->codigo = $dados['id'];
        $dadosRequisicao->senderId = $dados['sender_id'];

        $dadosEnvio = new DadosEnvio();
        $dadosDestinatario = $dadosEnvio->executar($dadosRequisicao);

        if (empty($dadosDestinatario)) {
            session()->flash('erro', 'Cliente não encontrado.');
            return;
        }

        $coleta = new Coleta(id_usuario_atual(), $dados['coleta']);

        $destinatario = $this->getDestinatario($dadosDestinatario['receiver_address']);

        $destinatario = new Destinatario($destinatario, $dados['cliente'], $dados['id'], new Coletado(), $origem);

        $endereco = $this->getEndereco($dadosDestinatario);

        $rastreio = $this->getCodigoRastreio();

        $pacote = new \App\src\Pacotes\NovoPacote($coleta, $destinatario, $endereco, $rastreio);
        $pacote->cadastrar();
    }

    private function getDestinatario($receiver_address): int
    {
        $cadastrarDestinatario = new CadastrarDestinatario(
            $receiver_address['receiver_name'],
            $receiver_address['receiver_phone'], null);

        return $cadastrarDestinatario->cadastrar();
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
