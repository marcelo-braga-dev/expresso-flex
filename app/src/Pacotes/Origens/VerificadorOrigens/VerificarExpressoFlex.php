<?php

namespace App\src\Pacotes\Origens\VerificadorOrigens;

use App\src\Pacotes\Origens\ExpressoFlex;
use App\src\Pacotes\Origens\Pacotes\CadastrarPacotesExrpessoFlex;

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

            return new ExpressoFlex($dados);
            // return new CadastrarPacotesExrpessoFlex($dados['id'], $dados['coleta']);
        }

        return $this->origem->verificar($dados);
    }
}
