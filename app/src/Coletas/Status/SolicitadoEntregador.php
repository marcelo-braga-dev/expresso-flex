<?php

namespace App\src\Coletas\Status;

use App\src\Coletas\AbrirColeta;
use App\src\Coletas\Coleta;

class SolicitadoEntregador extends StatusColeta
{
    private int $pontoColeta;
    private int $entregador;

    public function __construct(int $pontoColeta, int $entregador)
    {
        $this->pontoColeta = $pontoColeta;
        $this->entregador = $entregador;
    }

    function getStatus(): string
    {
        return 'coleta_aceita';
    }

    function solicitar(Coleta $coleta)
    {
        return (new AbrirColeta($this->pontoColeta, $this->entregador, $this->getStatus()))
            ->criar();
    }
}
