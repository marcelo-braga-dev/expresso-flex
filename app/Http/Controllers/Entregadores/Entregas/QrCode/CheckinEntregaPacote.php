<?php

namespace App\Http\Controllers\Entregadores\Entregas\QrCode;

use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\EntregaIniciado;

class CheckinEntregaPacote
{
    public function index()
    {
        $resposta = json_decode($_GET['json'], true);

        $pacote = new Pacote(new EntregaIniciado());
        $pacote->alterarStatus($resposta);

        return redirect()->route('entregadores.entregas.index');
    }
}
