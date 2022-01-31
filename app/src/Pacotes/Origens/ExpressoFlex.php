<?php

namespace App\src\Pacotes\Origens;

use App\Models\Etiquetas;
use App\Models\Pacotes;
use App\src\Pacotes\Origens\Pacotes\CadastrarPacotesExrpessoFlex;
use Illuminate\Database\Eloquent\Model;

class ExpressoFlex implements OrigemPacote
{
    public function cadastrarPacote($dados)
    {
        $pacote = new CadastrarPacotesExrpessoFlex($dados['id'], $dados['coleta']);
        $pacote->cadastrar();
    }

    public function getPacote($dados): Model
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
}
