<?php

namespace App\Http\Controllers\QrCode;

use App\Http\Controllers\Controller;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Coletado;
use App\src\QrCode\DecodeJson\DecodificarJson;
use Illuminate\Http\Request;

class CadastrarPacoteController extends Controller
{
    public function index(Request $request)
    {
        $cadastro = new DecodificarJson();
        $dados = $cadastro->decodificar($_GET);

        $pacote = new Pacote(new Coletado());
        $pacote->coletar($dados);

        return redirect()->route('entregadores.coletas.pacotes.show', $dados['coleta']);
    }
}
