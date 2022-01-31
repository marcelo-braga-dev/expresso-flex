<?php

namespace App\src\Etiquetas\Status;

class Impressa extends StatusEtiqueta
{
    private string $status = 'etiqueta_impressa';

    function getStatus(): string
    {
        return $this->status;
    }
}
