<?php

namespace App\src\Etiquetas;

use App\Models\Destinatarios;
use App\Models\Enderecos;
use App\Models\Pacotes;
use App\Models\User;
use Mpdf\Mpdf;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class NovaEtiquetaExpressoFlex
{
    public function novaEtiqueta($request)
    {
        $pacote = Pacotes::find($request->id);

        if ($pacote->user_id != id_usuario_atual()) return redirect()->back();

        $infoRemetente = $this->infoRemetente($pacote->user_id);


        $loja = get_loja($pacote->loja, $infoRemetente['id']);

        // Remetente
        $remetente = $infoRemetente['nome'];
        $idRemetente = $infoRemetente['id'];
        $telRemetente = isset($loja['celular']) ? $loja['celular'] : '';
        $endRemetente = get_endereco($loja['endereco']);

        // Destinatario
        $infoDestinatario = $pacote->destinatario()->first();
        $infoEnderecoDestinatario = $this->enderecoDestinatario($infoDestinatario->endereco);

        $destinatario = $infoDestinatario->nome;
        $telefoneRemetente = $infoDestinatario->telefone;
        $enderecoDestinatario = $infoEnderecoDestinatario['endereco'];
        $cidadeDestinatario = $infoEnderecoDestinatario['cidade'];
        $cep = $pacote->regiao;

        $codRastreio = $pacote->rastreio;

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            //'format' => [190, 236],
            'format' => 'A4-L',
            //'orientation' => 'L'
        ]);

        $imgQrCode = $this->gerarQrCode($pacote->id, $pacote->user_id);

        ob_start();

        include_once('modelos/nova-etiqueta.php');

        $html = ob_get_contents();
        ob_end_clean();

        $mpdf->SetTitle('Etiqueta - ' . $codRastreio);
        $mpdf->SetAuthor('Expresso Flex');

        $mpdf->WriteHTML($html);
        $mpdf->Output('Etiqueta - ' . $codRastreio . '.pdf', 'I');

        unlink($imgQrCode);
    }

    private function gerarQrCode($id, $senderId)
    {
        $options = new QROptions([
            'version' => 9,
            'eccLevel' => QRCode::ECC_L,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false
        ]);

        $hash_code = hash('md5', uniqid(rand(), true));

        $data =
            '{
                "id":"' . $id . '",
                "sender_id":' . $senderId . ',
                "hash_code":"' . $hash_code . '",
                "security_digit":"0",
                "origem":"expresso_flex"
            }';

        $QrCode = new QRCode($options);
        $qrCode = $QrCode->render($data);

        $pathImgQRCode = 'imageQRCode_' . uniqid() . '.png';

        file_put_contents($pathImgQRCode, $qrCode);

        return $pathImgQRCode;
    }

    private function infoRemetente($id)
    {
        $user = User::find($id);
        $metas = $user->meta()->get();
        $dadosUsuario = ['id' => $user->id, 'nome' => $user->nome];

        foreach ($metas as $meta) {
            $arg[$meta->meta_key] = $meta->value;
        }

        return array_merge($dadosUsuario, $arg);
    }

    private function enderecoDestinatario($id)
    {
        $enderecoCompleto = Enderecos::find($id);

        $endereco['endereco'] =
            $enderecoCompleto->rua .
            ', n. ' . $enderecoCompleto->numero;

        if (!empty($enderecoCompleto->complemento)) $endereco['endereco'] .= ', ' . $enderecoCompleto->complemento;

        $endereco['cidade'] = $enderecoCompleto->cidade;

        return $endereco;
    }
}
