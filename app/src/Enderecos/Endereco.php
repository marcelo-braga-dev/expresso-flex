<?php

namespace App\src\Enderecos;

use App\Models\Enderecos;

abstract class Endereco extends DadosEndereco
{
    private int $cep;
    private ?string $rua;
    private ?string $numero;
    private ?string $complemento;
    private ?string $bairro;
    private ?string $cidade;
    private ?string $estado;
    private ?string $latitude;
    private ?string $longitude;

    public function __construct()
    {
        $this->cep = 0;
        $this->rua = null;
        $this->numero = null;
        $this->complemento = null;
        $this->bairro = null;
        $this->cidade = null;
        $this->estado = null;
        $this->latitude = null;
        $this->longitude = null;
    }

    public function salvar()
    {
        $endereco = new Enderecos();
        return $endereco->cadastrar($this);
    }

    public function getCep()
    {
        return $this->cep;
    }

    protected function setCep(string $cep): void
    {
        $this->cep = preg_replace('/\D/', '', $cep);
    }

    public function getRua()
    {
        return $this->rua;
    }

    protected function setRua($rua): void
    {
        $this->rua = $rua;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    protected function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    protected function setComplemento($complemento): void
    {
        $this->complemento = $complemento;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    protected function setBairro($bairro): void
    {
        $this->bairro = $bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    protected function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    protected function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    protected function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    protected function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }


}
