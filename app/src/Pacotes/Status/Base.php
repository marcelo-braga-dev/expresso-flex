<?php

namespace App\src\Pacotes\Status;

use App\src\Pacotes\Origens\VerificadorOrigens\VerificarOrigemPacote;

class Base extends Status
{
    private string $status = 'pacote_base';

    function getStatus(): string
    {
        return $this->status;
    }
}
