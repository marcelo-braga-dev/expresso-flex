<?php

namespace App\src\Pacotes\Info;

use App\src\Pacotes\Origens\OrigemPacote;
use App\src\Pacotes\Status\Status;

class Destinatario
{
    private int $destinatario;
    private int $cliente;
    private ?string $codigo;
    private Status $status;
    private string $origem;

    public function __construct(int $destinatario, int $cliente, ?string $codigo, Status $status, string $origem)
    {
        $this->destinatario = $destinatario;
        $this->cliente = $cliente;
        $this->codigo = $codigo;
        $this->status = $status;
        $this->origem = $origem;
    }

    public function getDestinatario()
    {
        return $this->destinatario;
    }

    public function getCliente(): int
    {
        return $this->cliente;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function getStatus(): string
    {
        return $this->status->getStatus();
    }

    public function getOrigem(): string
    {
        return $this->origem;
    }


}
