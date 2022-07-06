<?php

namespace App\src\Pacotes\Status;

class EntregaCanceladaCliente extends Status
{
    private string $status = 'pacote_cancelado_cliente';

    function getStatus(): string
    {
        return $this->status;
    }

    function getNomeStatus(): string
    {
        return 'Entrega cancelada';
    }
}
