<?php

namespace App\src\Pacotes\Destinatarios;

interface Destinatario
{
    public function getNome(): string;

    public function getTelefone(): ?string;

    public function getDocumento(): ?string;
}
