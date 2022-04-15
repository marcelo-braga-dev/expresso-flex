<?php

namespace App\src\Pacotes\Status;

class DestinatarioAusente extends Status
{
    private string $status = 'pacote_destinatario_ausente';

    function getStatus(): string
    {
        return $this->status;
    }
}
