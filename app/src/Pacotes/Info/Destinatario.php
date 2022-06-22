<?php

namespace App\src\Pacotes\Info;

use App\src\Pacotes\Origens\OrigemPacote;
use App\src\Pacotes\Status\Status;

class Destinatario
{
    private int $id;
    private int $endereco;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdEndereco($id)
    {
        $this->endereco = $id;
    }

    public function getIdEndereco(): int
    {
        return $this->endereco;
    }
}
