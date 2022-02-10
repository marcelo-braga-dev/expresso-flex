<?php

namespace App\src\QrCode\DecodeJson;

use App\Exceptions\QrCodeException;

class DecodificarJson
{
    /** @throws QrCodeException */

    public function decodificar($dados): array
    {
        $dadosPacote = json_decode($dados->json, true);

        if (!is_array($dadosPacote)) throw new QrCodeException();

        return array_merge(
            $dadosPacote, [
                'coleta' => $dados->idColeta,
                'cliente' => $dados->idSeller
            ]
        );
    }
}
