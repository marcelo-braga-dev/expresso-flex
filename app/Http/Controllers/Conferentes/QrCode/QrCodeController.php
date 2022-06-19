<?php

namespace App\Http\Controllers\Conferentes\QrCode;

use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Base;
use App\src\QrCode\DecodeJson\DecodificarJson;
use Illuminate\Http\Request;

class QrCodeController
{
    public function checkinPacote(Request $request)
    {
        $resposta = "Checkin na Base realizado com sucesso!";

        try {
            $dados = (new DecodificarJson())->decodificar($request->json);

            $pacote = new Pacote(new Base());
            $pacote->alterarStatus($dados, $request->user_id);
        } catch (\DomainException $e) {
            $resposta = $e->getMessage();
        }

        return ['resposta' => $resposta];
    }
}
