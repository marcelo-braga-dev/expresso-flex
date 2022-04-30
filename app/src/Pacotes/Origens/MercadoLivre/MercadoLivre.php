<?php

namespace App\src\Pacotes\Origens\MercadoLivre;

use App\Models\Pacotes;
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
        $pacotes = new Pacotes();

        return $pacotes->newQuery()
            ->where('origem', '=', $this->getOrigem())
            ->where('codigo', '=', $dados['id'])
            ->first();
    }

    public function getOrigem(): string
    {
        return $this->origem;
    }
}
