<?php

namespace App\src\Pacotes\Origens\Pacotes\MercadoLivre;

use App\Models\SolicitacaoRetiradas;
use App\src\Pacotes\Info\Coleta;

class BuscarColeta
{
    public function coleta(int $id)
    {
        $solicitacao = new SolicitacaoRetiradas();
        $coleta = $solicitacao->coleta($id);

        return new Coleta($coleta->user_id, $id);
    }
}
