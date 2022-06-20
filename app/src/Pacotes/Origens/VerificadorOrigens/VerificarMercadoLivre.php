<?php

namespace App\src\Pacotes\Origens\VerificadorOrigens;


use App\src\Pacotes\Origens\MercadoLivre\MercadoLivre;

class VerificarMercadoLivre implements VerificadorOrigemPacote
{
    public function verificar($dados)
    {
        if (!empty($dados['id']) &&
            !empty($dados['sender_id']) &&
            !array_key_exists('origem', $dados)) {
            return new MercadoLivre();
        }
        throw new \DomainException('Erro na leitura do QrCode. Origem do pacote não encontrada.');
    }
}
