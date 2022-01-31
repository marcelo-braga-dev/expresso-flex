<?php

namespace App\src\Pacotes\Info;

abstract class Cadastrar
{
    abstract public function cliente();

    abstract public function rastreio();

    abstract public function codigo();

    abstract public function coleta();

    abstract public function endereco();

    abstract public function entregador();

    abstract public function destinatario();

    abstract public function status();

    abstract public function cep();

    abstract public function origem();

    abstract public function descricao();
}
