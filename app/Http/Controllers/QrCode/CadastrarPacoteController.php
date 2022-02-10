<?php

namespace App\Http\Controllers\QrCode;

use App\Exceptions\QrCodeException;
use App\Http\Controllers\Controller;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Coletado;
use App\src\QrCode\DecodeJson\DecodificarJson;
use Illuminate\Http\Request;

class CadastrarPacoteController extends Controller
{
    public function index(Request $request)
    {
        try {
            $cadastro = new DecodificarJson();
            $dados = $cadastro->decodificar($request);

            $pacote = new Pacote(new Coletado());
            $pacote->coletar($dados);
        } catch (QrCodeException $e) {

            session()->flash('erro', 'Não foi possível ler o QrCode.');
            return redirect()->route('entregadores.coletas-abertas.index');
        }

        return redirect()->route('entregadores.coletas.pacotes.show', $dados['coleta']);
    }
}
