<?php

namespace App\src\Coletas\Status;

class CanceladoDia extends StatusColeta
{
    private string $status = 'coleta_cancelada_dia';

    function getStatus(): string
    {
        return $this->status;
    }
}
