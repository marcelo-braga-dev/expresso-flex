<?php

namespace App\src\Pacotes\Origens\VerificadorOrigens;


use App\src\Pacotes\Origens\ExpressoFlex\ExpressoFlex;

class VerificarExpressoFlex implements VerificadorOrigemPacote
{
    private VerificadorOrigemPacote $origem;

    public function __construct(?VerificadorOrigemPacote $origem)
    {
        $this->origem = $origem;
    }

    public function verificar($dados)
    {
        if (!empty($dados['origem']) && $dados['origem'] === 'expresso_flex') {
            if (!is_int($dados['id']) || !is_int($dados['sender_id'] )) {
                throw new \DomainException('Erro na leitura do QrCode, dados inválidos.');
            }
            return new ExpressoFlex();
        }
        return $this->origem->verificar($dados);
    }
}
