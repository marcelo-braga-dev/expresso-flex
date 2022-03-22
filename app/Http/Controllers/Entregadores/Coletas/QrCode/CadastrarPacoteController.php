<?php

namespace App\Http\Controllers\Entregadores\Coletas\QrCode;

use App\Exceptions\QrCodeException;
use App\src\Pacotes\Pacote;
use App\src\Pacotes\Status\Coletado;
use App\src\QrCode\DecodeJson\DecodificarJson;
use Illuminate\Http\Request;

class CadastrarPacoteController
{
    public function execute(Request $request)
    {
        try {
            $cadastro = new DecodificarJson();
            $dados = $cadastro->decodificar($request);

            $pacote = new Pacote(new Coletado());
            $pacote->coletar($dados);

            return redirect()->route('entregadores.coletas.pacotes.show', $dados['coleta']);
        } catch (QrCodeException $e) {
            session()->flash('erro', 'Não foi possível ler o QrCode.');

            return redirect()->route('entregadores.coletas-abertas.index');
        }
    }
}
