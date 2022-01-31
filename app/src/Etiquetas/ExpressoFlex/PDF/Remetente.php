<?php

namespace App\src\Etiquetas\ExpressoFlex\PDF;

use App\Models\User;
use App\Models\UserMeta;

class Remetente
{
    public string $nome;
    public string $telefone;
    private int $remetente;

    public function __construct(int $remetente)
    {
        $this->remetente = $remetente;
        $this->nome = $this->getNome();
        $this->telefone = $this->getTelefone();
    }

    private function getNome(): string
    {
        $users = new User();

        $user = $users->dados($this->remetente);

        return $user->name;
    }

    private function getTelefone()
    {
        $user = new User();
        return $user->metaValue($this->remetente, 'telefone');
    }
}
