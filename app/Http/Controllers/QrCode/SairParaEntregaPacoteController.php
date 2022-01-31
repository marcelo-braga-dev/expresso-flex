<?php

namespace App\Http\Controllers\QrCode;

use App\Http\Controllers\Controller;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Base;
use App\src\Pacotes\Status\EntregaIniciado;
use Illuminate\Http\Request;

class SairParaEntregaPacoteController extends Controller
{
    public function index()
    {
        $resposta = json_decode($_GET['json'], true);

        $pacote = new Pacote(new EntregaIniciado());
        $pacote->alterarStatus($resposta);

        return redirect()->route('entregadores.entregas.index');
    }
}
