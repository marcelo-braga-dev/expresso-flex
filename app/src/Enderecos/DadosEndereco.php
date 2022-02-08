<?php

namespace App\src\Enderecos;

abstract class DadosEndereco
{
    abstract public function cep(string $cep);
    abstract public function enderecoCompleto(string $dado);
    abstract public function rua(string $dado);
    abstract public function numero(string $dado);
    abstract public function complemento(?string $dado);
    abstract public function bairro(string $dado);
    abstract public function cidade(string $dado);
    abstract public function estado(string $dado);
    abstract public function latitude(string $dado);
    abstract public function longitude(string $dado);
}
