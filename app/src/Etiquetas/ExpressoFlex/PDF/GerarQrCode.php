<?php

namespace App\src\Etiquetas\ExpressoFlex\PDF;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

/**
 * Referencia https://www.han-soft.com/releases/barcode2d/documents/b_qrcode.html
 */
class GerarQrCode
{
    public function gerar($id, $senderId): string
    {
        $options = new QROptions([
            'version' => QRCode::VERSION_AUTO,
            'eccLevel' => QRCode::ECC_H,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false
        ]);

        $data =
            '{' .
                '"id":' . $id . ',' .
                '"sender_id":' . $senderId . ',' .
                '"origem":"expresso_flex"' .
            '}';

        $QrCode = new QRCode($options);
        $qrCode = $QrCode->render($data);

        $pathImgQRCode = storage_path('qrcode-etiquetas/') . 'imageQRCode_' . uniqid() . '.png';

        file_put_contents($pathImgQRCode, $qrCode);

        return $pathImgQRCode;
    }
}
