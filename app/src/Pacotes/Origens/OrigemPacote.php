<?php

namespace App\src\Pacotes\Origens;

interface OrigemPacote
{
    public function cadastrarPacote($dados);

    public function getPacote($dados);
}
