<?php

namespace App\src\Pacotes\Status;

class EntregaIniciado extends Status
{
    private string $status = 'pacote_entrega_iniciado';

    function getStatus(): string
    {
        return $this->status;
    }
}
