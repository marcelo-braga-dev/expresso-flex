<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote;

use App\Models\Pacotes;
use App\src\Integracoes\MercadoLivre\Recursos\DadosEnvio;
use App\src\Integracoes\MercadoLivre\Requisicoes\DadosRequisicao;
use App\src\Pacotes\CadastrarPacote;
use App\src\Pacotes\CodigoRastreio;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos\EnderecoDestinatario;
use App\src\Pacotes\Status\Coletado;

class CadastrarPacoteMercadoLivre
{
    public function cadastrar($dados, $origem)
    {
        $dadosRequisicao = new DadosRequisicao();
        $dadosRequisicao->codigo = $dados['id'];
        $dadosRequisicao->senderId = $dados['sender_id'];

        if ($this->verificarDuplicidade($dados['id'], $origem)) {
            session()->flash('erro', 'Pacote já cadastrado.');
            return;
        }

        $dadosEnvio = new DadosEnvio();
        $dadosDestinatario = $dadosEnvio->executar($dadosRequisicao);

        $coleta = new Coleta(id_usuario_atual(), $dados['coleta']);

        $destinatario = $this->getDestinatario($dadosDestinatario['receiver_address']);

        $destinatario = new Destinatario($destinatario, $dados['cliente'], $dados['id'], new Coletado(), $origem);

        $endereco = $this->getEndereco($dadosDestinatario);

        $rastreio = $this->getCodigoRastreio();

        $pacote = new CadastrarPacote($coleta, $destinatario, $endereco, $rastreio);
        $pacote->cadastrar();
    }

    private function verificarDuplicidade($codigo, $origem): bool
    {
        $pacotes = new Pacotes();

        return $pacotes->newQuery()
            ->where([
                ['codigo', '=', $codigo],
                ['origem', '=', $origem]
            ])->exists();
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
