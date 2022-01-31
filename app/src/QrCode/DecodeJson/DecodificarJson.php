<?php

namespace App\src\QrCode\DecodeJson;

class DecodificarJson
{
    public function decodificar($dados)
    {
        $dadosPacote = json_decode($dados['json'], true);

        $array = array_merge(
            $dadosPacote, [
                'coleta' => $dados['idColeta'],
                'cliente' => $dados['idSeller']
            ]
        );

        //if ($this->qrCodeCorrompido($array)) {
        //    session()->flash('erro', 'Ocorreu um erro na leitura do código de barras.');
        //    return redirect()->route('entregadores.coletas.todas-coletas');
        //}

        //$resposta = array_merge(
        //    $array,
        //    ['id_coleta' => $_GET['idColeta'], 'id_seller' => $_GET['idSeller']]
        //);
        //
        //if (empty($array['origem'])) {
        //    $resposta = array_merge($resposta, ['origem' => 'mercado_livre']);
        //}

        return $array;
    }
}
