<?php

namespace App\Http\Controllers\QrCode;

use App\Http\Controllers\Controller;
use App\src\QrCode\DecodeJson\DecodificarJson;
use Illuminate\Http\Request;

class ConferenteController extends Controller
{
    // Recebe os dados do app e redireciona pra rota de info pacote
    public function infoCheckin()
    {
        $resposta = json_decode($_GET['json'], true);

        if ($this->qrCodeCorrompido($resposta)) {
            session()->flash('erro', 'Ocorreu um erro na leitura no código de barras.');
            return redirect()->route('conferente.checkin.pacotes');
        }

        if (empty($resposta['origem'])) {
            $resposta = array_merge($resposta, ['origem' => 'mercado_livre']);
        }

        return redirect()->route('conferentes.checkin.create', $resposta);
    }

    public function qrCodeCorrompido($resposta)
    {
        if (empty($resposta['id']) || empty($resposta['sender_id']) || !is_array($resposta)) {
            return true;
        }

        return false;
    }
}
