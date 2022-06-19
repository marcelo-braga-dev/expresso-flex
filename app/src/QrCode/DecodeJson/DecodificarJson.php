<?php

namespace App\src\QrCode\DecodeJson;

class DecodificarJson
{
    public function decodificar($json): array
    {
        $dados = json_decode($json, true);

        if (!is_array($dados)) throw new \DomainException("Leitura Inválida");
        return $dados;
    }
}
