<?php

namespace App\src\Pacotes\Info;

class Endereco
{
    private int $endereco;
    private int $cep;

    public function __construct(int $endereco)
    {
        $this->endereco = $endereco;
        $this->cep = get_cep_endereco($endereco);
    }

    public function getEndereco(): int
    {
        return $this->endereco;
    }

    public function getCep(): int
    {
        return $this->cep;
    }
}
