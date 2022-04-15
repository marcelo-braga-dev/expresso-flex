<?php

namespace App\src\Etiquetas\Status;

abstract class StatusEtiqueta
{
    abstract function getStatus(): string;
}
