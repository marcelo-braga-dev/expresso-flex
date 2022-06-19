<?php

namespace App\src\Pacotes;

use App\src\Pacotes\Status\Status;

class Pacote
{
    private Status $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    public function coletar($dados)
    {
        $this->status->coletar($dados);
    }

    public function alterarStatus($dados, $userId)
    {
        $this->status->update($dados, $userId);
    }

    public function finalizar(int $id)
    {
        $this->status->finalizar($id);
    }
}
