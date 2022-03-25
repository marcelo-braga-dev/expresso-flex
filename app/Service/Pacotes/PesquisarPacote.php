<?php

namespace App\Service\Pacotes;

use App\Models\Pacotes;

class PesquisarPacote
{
    public function pesquisar($codigo)
    {
        $pacotes = new Pacotes();
        $pacote = $pacotes->newQuery()
            ->where('rastreio', '=', $codigo)
            ->orWhere('codigo', '=', $codigo)
            ->first();

        return $pacote ?? '';
    }
}
