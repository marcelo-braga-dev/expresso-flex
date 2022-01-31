<?php

namespace App\src\Etiquetas\ExpressoFlex\PDF;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class GerarQrCode
{
    public function gerar($id, $senderId)
    {
        $options = new QROptions([
            'version' => 9,
            'eccLevel' => \chillerlan\QRCode\QRCode::ECC_L,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false
        ]);

        $data =
            '{
                "id":"' . $id . '",
                "sender_id":' . $senderId . ',
                "hash_code":"' . md5('expresso_flex') . '",
                "security_digit":"0",
                "origem":"expresso_flex"
            }';

        $QrCode = new QRCode($options);
        $qrCode = $QrCode->render($data);

        $pathImgQRCode = 'imageQRCode_' . uniqid() . '.png';

        file_put_contents($pathImgQRCode, $qrCode);

        return $pathImgQRCode;
    }
}
