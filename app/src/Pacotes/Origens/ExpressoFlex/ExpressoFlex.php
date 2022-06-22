<?php

namespace App\src\Pacotes\Origens\ExpressoFlex;

use App\Models\Etiquetas;
use App\Models\Pacotes;
use App\src\Pacotes\Origens\OrigemPacote;
use Illuminate\Database\Eloquent\Model;

class ExpressoFlex implements OrigemPacote
{
    private string $origem = 'expressoflex';

    public function cadastrarPacote($dados)
    {
        $pacote = new CadastrarPacotesExrpessoFlex($dados['id'], $dados['coleta'], $dados['entregador']);
        return $pacote->cadastrar();
    }

    public function getPacote($dados)
    {
        $etiquetas = new Etiquetas();

        $etiqueta = $etiquetas->newQuery()
            ->where([
                ['id', '=', $dados['id']],
            ])->first('rastreio');

        $pacotes = new Pacotes();

        return $pacotes->newQuery()
            ->where('rastreio', '=', $etiqueta->rastreio)
            ->first();
    }

    public function getOrigem(): string
    {
        return $this->origem;
    }
}
