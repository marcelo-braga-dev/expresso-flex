<?php

namespace App\src\Etiquetas\ExpressoFlex\PDF;

use App\Models\Destinatarios;

class Destinatario
{
    public string $nome;
    public ?string $telefone;
    public string $cpf;
    public string $endereco;
    private $destinatario;
    private int $idDestinatario;

    public function __construct(int $idDestinatario, int $idEndereco)
    {
        $this->idDestinatario = $idDestinatario;
        $this->endereco = $this->getEndereco($idEndereco);
        $this->destinatario = $this->getDestinatario();
        $this->nome = $this->getNome();
        $this->telefone = $this->getTelefone();
        $this->cpf = $this->getCpf();
    }

    private function getEndereco($id)
    {
        return get_endereco($id);
    }

    private function getDestinatario()
    {
        $destinatario = new Destinatarios();

        return $destinatario->getDestinatario($this->idDestinatario);
    }

    private function getNome(): string
    {
        return $this->destinatario->nome;
    }

    private function getTelefone(): ?string
    {
        return $this->destinatario->telefone;
    }

    private function getCpf(): ?string
    {
        return $this->destinatario->cpf;
    }
}
