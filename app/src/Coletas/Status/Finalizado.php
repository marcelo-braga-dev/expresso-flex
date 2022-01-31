<?php

namespace App\src\Coletas\Status;

class Finalizado extends StatusColeta
{
    private string $status = 'coleta_finalizada';

    function getStatus(): string
    {
        return $this->status;
    }
}
