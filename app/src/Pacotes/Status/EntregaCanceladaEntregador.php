<?php

namespace App\src\Pacotes\Status;

class EntregaCanceladaEntregador extends Status
{
    private string $status = 'pacote_entrega_cancelada_entregador';

    function getStatus(): string
    {
        return $this->status;
    }
}
