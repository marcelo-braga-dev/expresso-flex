<?php

namespace App\src\QrCode\DecodeJson;

class DecodificarJson
{
    public function decodificar($dados)
    {
        $dadosPacote = json_decode($dados->json, true);

        // if ($this->qrCodeCorrompido($array)) {
        //     session()->flash('erro', 'Ocorreu um erro na leitura do código de barras.');
        //     throw new QrCodeException();
        // }

        return array_merge(
            $dadosPacote, [
                'coleta' => $dados->idColeta,
                'cliente' => $dados->idSeller
            ]
        );
    }
}
