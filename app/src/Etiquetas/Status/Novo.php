<?php

namespace App\src\Etiquetas\Status;

class Novo extends StatusEtiqueta
{
    private string $status = 'etiqueta_novo';

    function getStatus(): string
    {
        return $this->status;
    }
}
