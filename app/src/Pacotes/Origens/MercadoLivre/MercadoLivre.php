<?php

namespace App\src\Pacotes\Origens\MercadoLivre;

use App\src\Pacotes\Origens\MercadoLivre\Pacote\Pacote;
use App\src\Pacotes\Origens\OrigemPacote;

class MercadoLivre implements OrigemPacote
{
    private string $origem = 'mercado_livre';

    public function cadastrarPacote($dados)
    {
        $cadastrar = new Pacote($this->origem);
        $cadastrar->cadastrar($dados);
    }

    public function getPacote($dados)
    {
        // TODO: Implement getPacote() method.
    }

    public function getOrigem(): string
    {
        return $this->origem;
    }
}
