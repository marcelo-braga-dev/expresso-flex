<?php

namespace App\src\Pacotes\Origens\Pacotes\MercadoLivre;

use App\src\MercadoLivre\ServicesMercadoLivre;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Status\Coletado;

class DestinatarioML
{
    private int $endereco;

    public function cadastrar($dados)
    {
        $service = new ServicesMercadoLivre();
        $dadosDestinatario = $service->getEndereco($dados['id'], $dados['sender_id']);

        $destinatario = $this->getDestinatario();

        $cadastrarEndereco = new CadastrarEndereco();
        $this->endereco = $cadastrarEndereco->cadastrar($dadosDestinatario);

        return new Destinatario($destinatario,
            $dados['cliente'], 102030, new Coletado(), 'mercado_livre');
    }

    public function getEndereco()
    {
        return new Endereco($this->endereco);
    }

    private function getDestinatario(): int
    {
        $cadastrarDestinatario = new CadastrarDestinatario(
            '$dadosDestinatario[\'destinatario\']',
            '$dadosDestinatario[\'telefone\']', null);

        return $cadastrarDestinatario->salvar();
    }
}
