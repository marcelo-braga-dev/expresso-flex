<?php

namespace App\Http\Controllers\QrCode;

use App\Exceptions\QrCodeException;
use App\Http\Controllers\Controller;

class ConferenteController extends Controller
{
    // Recebe os dados do app e redireciona pra rota de info pacote
    public function infoCheckin()
    {
        $resposta = json_decode($_GET['json'], true);

        try {
            if (!is_array($resposta)) throw new QrCodeException();

            if ($this->qrCodeCorrompido($resposta)) throw new QrCodeException();

            if (empty($resposta['origem'])) {
                $resposta = array_merge($resposta, ['origem' => 'mercado_livre']);
            }
        } catch (QrCodeException $e) {
            session()->flash('erro', 'Não foi possível ler o QrCode.');
            return redirect()->route('conferente.checkin.pacotes');
        }

        return redirect()->route('conferentes.checkin.create', $resposta);
    }

    public function qrCodeCorrompido($resposta): bool
    {
        return empty($resposta['id']) || empty($resposta['sender_id']) || !is_array($resposta);
    }
}
