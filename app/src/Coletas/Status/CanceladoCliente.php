<?php

namespace App\src\Coletas\Status;

class CanceladoCliente extends StatusColeta
{
    private string $status = 'coleta_cancelada_cliente';

    function getStatus(): string
    {
        return $this->status;
    }
}
