<?php

namespace App\src\Etiquetas\Status;

class Finalizado extends StatusEtiqueta
{
    private string $status = 'etiqueta_finalizado';

    function getStatus(): string
    {
        return $this->status;
    }
}
