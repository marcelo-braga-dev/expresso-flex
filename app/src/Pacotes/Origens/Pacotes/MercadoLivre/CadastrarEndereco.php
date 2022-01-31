<?php

namespace App\src\Pacotes\Origens\Pacotes\MercadoLivre;

use App\Models\Enderecos;
use App\src\Enderecos\Endereco;

class CadastrarEndereco extends Endereco
{
    private $dados;

    public function cadastrar($dados)
    {
        $this->dados = $dados;
        $endereco = new Enderecos();
        return $endereco->cadastrar($this);
    }

    protected function cep()
    {
        return '123456'; //$this->dados['cep'];
    }

    protected function rua()
    {
        // TODO: Implement rua() method.
    }

    protected function numero()
    {
        // TODO: Implement numero() method.
    }

    protected function complemento()
    {
        // TODO: Implement complemento() method.
    }

    protected function bairro()
    {
        // TODO: Implement bairro() method.
    }

    protected function cidade()
    {
        // TODO: Implement cidade() method.
    }

    protected function estado()
    {
        // TODO: Implement estado() method.
    }

    protected function latitude()
    {
        // TODO: Implement latitude() method.
    }

    protected function longitude()
    {
        // TODO: Implement longitude() method.
    }
}
