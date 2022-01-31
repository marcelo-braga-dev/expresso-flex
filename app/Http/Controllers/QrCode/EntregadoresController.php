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

    public function identificaUsuario()
    {
        $resposta = json_decode($_GET['json'], true);

        if (empty($resposta['id']) || empty($resposta['origem'] || empty($resposta['id_loja']))) {
            session()->flash('erro', 'Ocorreu um erro na leitura do QrCode.');

            return redirect()->route('entregadores.coletas.criar-coleta');
        }

        if ($resposta['origem'] != 'identifica_usuario') {
            session()->flash('erro', 'Esse QrCode não é de identificação de pontos de coleta.');

            return redirect()->route('entregadores.coletas.criar-coleta');
        }

        $coletaService = new ColetaService();

        $coletaService->criarColetaComEntregador($resposta['id_loja']);

        return redirect()->route('entregadores.coletas.todas-coletas');
    }
}
