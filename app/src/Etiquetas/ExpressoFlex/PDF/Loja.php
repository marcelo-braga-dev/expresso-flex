<?php

namespace App\src\Etiquetas\ExpressoFlex\PDF;

use App\Models\LojasClientes;

class Loja
{
    private $loja;
    public string $nome;
    public string $telefone;
    public string $endereco;
    private int $idRemetente;

    public function __construct(int $idLoja)
    {
        $this->idRemetente = $idLoja;
        $this->loja = $this->getLoja();
        $this->nome = $this->getNome();
        $this->telefone = $this->getTelefone();
        $this->endereco = $this->getEndereco();
    }

    private function getLoja()
    {
        $loja = new LojasClientes();

        return $loja->newQuery()
            ->where('id', '=', $this->idRemetente)
            ->first();
    }

    private function getNome(): string
    {
        return $this->loja->nome;
    }

    private function getTelefone(): string
    {
        return $this->loja->celular;
    }

    private function getEndereco(): string
    {
        return get_endereco($this->loja->endereco);
    }
}
