<?php

namespace App\Http\Controllers\QrCode;

use App\Http\Controllers\Controller;

class EntregadoresController extends Controller
{
    // Recebe os dados do app e redireciona pra rota de salvar pacote
    public function novoPacote()
    {
        $array = json_decode($_GET['json'], true);

        if ($this->qrCodeCorrompido($array)) {
            session()->flash('erro', 'Ocorreu um erro na leitura do código de barras.');
            return redirect()->route('entregadores.coletas.todas-coletas');
        }

        $resposta = array_merge(
            $array,
            ['id_coleta' => $_GET['idColeta'], 'id_seller' => $_GET['idSeller']]
        );

        if (empty($array['origem'])) {
            $resposta = array_merge($resposta, ['origem' => 'mercado_livre']);
        }

        return redirect()->route('entregadores.pacotes.salvar-pacote', $resposta);
    }

    // Recebe os dados do app e redireciona pra rota cadastrar entrega de pacotes
    public function cadastrarEntrega()
    {
        $resposta = json_decode($_GET['json'], true);

        if ($this->qrCodeCorrompido($resposta)) {
            session()->flash('erro', 'Ocorreu um erro na leitura no código de barras.');
            return redirect()->route('entregadores.entrega.cadastrar-pacotes');
        }

        if (empty($resposta['origem'])) {
            $resposta = array_merge($resposta, ['origem' => 'mercado_livre']);
        }

        return redirect()->route('entregadores.entrega.cadastrar-pacotes.qr-code', $resposta);
    }

    // Recebe os dados do app e redireciona pra rota info pacote entrega
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

    public function qrCodeCorrompido($resposta)
    {
        if (empty($resposta['id']) || empty($resposta['sender_id']) || !is_array($resposta)) {
            return true;
        }

        return false;
    }
}
