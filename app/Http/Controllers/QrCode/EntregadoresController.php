<?php

namespace App\Http\Controllers\QrCode;

use App\Exceptions\QrCodeException;
use App\Http\Controllers\Controller;

class EntregadoresController extends Controller
{
    // Recebe os dados do app e redireciona pra rota info pacote entrega
    public function entregarDestinatario()
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
            return redirect()->route('entregadores.entrega.em-andamento');
        }

        return redirect()->route('entregadores.entrega.em-andamento.info.qr-code', $resposta);
    }

    public function qrCodeCorrompido($resposta): bool
    {
        return empty($resposta['id']) || empty($resposta['sender_id']) || !is_array($resposta);
    }
}
