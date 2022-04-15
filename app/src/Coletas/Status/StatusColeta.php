<?php

namespace App\src\Coletas\Status;

use App\src\Coletas\Coleta;

abstract class StatusColeta
{
    abstract function getStatus(): string;

    public function solicitar(Coleta $coleta)
    {
        throw new \DomainException('Esta coleta não pode ser solicitada');
    }

    public function aceitar(Coleta $coleta, int $idLoja)
    {
        throw new \DomainException('Esta coleta não pode ser aceita');
    }

    public function finalizar(Coleta $coleta)
    {
        throw new \DomainException('Esta coleta não pode ser finalizada');
    }
}
