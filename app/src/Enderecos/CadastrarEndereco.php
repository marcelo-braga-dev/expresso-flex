<?php

namespace App\src\Enderecos;

use App\Models\Enderecos;

class CadastrarEndereco extends Endereco
{
    public function cadastrar()
    {
        return (new Enderecos())->cadastrar($this);
    }

    public function atualizar($id)
    {
        (new Enderecos())->atualizar($id, $this);
    }

    public function cep(string $cep)
    {
        $cep = preg_replace('/\D/', '', $cep);
        $this->setCep($cep);
    }

    public function rua(string $dado)
    {
        $this->setRua($dado);
    }

    public function numero(string $dado)
    {
        $this->setNumero($dado);
    }

    public function complemento(?string $dado)
    {
        $this->setComplemento($dado);
    }

    public function bairro(string $dado)
    {
        $this->setBairro($dado);
    }

    public function cidade(string $dado)
    {
        $this->setCidade($dado);
    }

    public function estado(string $dado)
    {
        $this->setEstado($dado);
    }

    public function latitude(string $dado)
    {
        $this->setLatitude($dado);
    }

    public function longitude(string $dado)
    {
        $this->setLongitude($dado);
    }

    public function enderecoCompleto(string $dado)
    {
        $this->setEnderecoCompleto($dado);
    }
}
