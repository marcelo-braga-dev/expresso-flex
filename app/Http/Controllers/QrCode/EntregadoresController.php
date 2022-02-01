<?php

namespace App\Http\Controllers\QrCode;

use App\Http\Controllers\Controller;

class EntregadoresController extends Controller
{
    // Recebe os dados do app e redireciona pra rota info pacote entrega
    public function qrCodeCorrompido($resposta)
    {
        if (empty($resposta['id']) || empty($resposta['sender_id']) || !is_array($resposta)) {
            return true;
        }

        return false;
    }

    public function entregarDestinatario()
    {
        $resposta = json_decode($_GET['json'], true);

        if ($this->qrCodeCorrompido($resposta)) {
            session()->flash('erro', 'Ocorreu um erro na leitura no código de barras.');
            return redirect()->route('entregadores.entrega.em-andamento');
        }

        if (empty($resposta['origem'])) {
            $resposta = array_merge($resposta, ['origem' => 'mercado_livre']);
        }

        return redirect()->route('entregadores.entrega.em-andamento.info.qr-code', $resposta);
    }
}
