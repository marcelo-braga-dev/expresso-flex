<?php

namespace App\Http\Controllers\QrCode;

use App\Exceptions\QrCodeException;
use App\Http\Controllers\Controller;

class AbrirSolicitacaoColetaController extends Controller
{
    /** @throws QrCodeException */

    public function index()
    {
        $resposta = json_decode($_GET['json'], true);

        try {
            if (!is_array($resposta)) throw new QrCodeException();

            if ($this->getResposta($resposta)) throw new QrCodeException();

            if ($resposta['origem'] != 'identifica_usuario') throw new QrCodeException();

        } catch (QrCodeException $e) {
            session()->flash('erro', 'Ocorreu um erro na leitura do QrCode.');
            return redirect()->route('entregadores.coletas.create');
        }

        return redirect()->route('entregadores.coletas.store', $resposta)->withInput(['id' => 'vd']);
    }

    private function getResposta($resposta): bool
    {
        return empty($resposta['id']) || empty($resposta['origem'] || empty($resposta['id_loja']));
    }
}
