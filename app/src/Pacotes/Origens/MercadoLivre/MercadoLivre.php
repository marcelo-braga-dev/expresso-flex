<?php

namespace App\src\Pacotes\Origens\MercadoLivre;

use App\src\Pacotes\Origens\MercadoLivre\Pacote\CadastrarPacoteMercadoLivre;
use App\src\Pacotes\Origens\OrigemPacote;

class MercadoLivre implements OrigemPacote
{
    private string $origem = 'mercado_livre';

    public function cadastrarPacote($dados)
    {
        $cadastrar = new CadastrarPacoteMercadoLivre();
        $cadastrar->cadastrar($dados, $this->origem);
    }

    public function getPacote($dados)
    {
        // TODO: Implement getPacote() method.
    }
}
