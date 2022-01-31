<?php

namespace App\src\Pacotes\Destinatarios;

use App\Models\Destinatarios;

class CadastrarDestinatario implements Destinatario
{
    private string $nome;
    private ?string $telefone;
    private ?string $documento;

    public function __construct(string $nome, ?string $telefone, ?string $documento)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->documento = $documento;
    }

    public function salvar(): int
    {
        $destinarario = new Destinatarios();
        return $destinarario->cadastrar($this);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

}
