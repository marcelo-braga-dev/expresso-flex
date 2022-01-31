<?php

namespace App\src\Coletas\Status;

class CanceladoEntregador extends StatusColeta
{
    private string $status = 'coleta_cancelada_entregador';

    function getStatus(): string
    {
        return $this->status;
    }
}
