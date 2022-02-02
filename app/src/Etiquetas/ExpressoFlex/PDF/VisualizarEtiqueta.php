<?php

namespace App\src\Etiquetas\ExpressoFlex\PDF;

use App\Models\Etiquetas;
use Mpdf\Mpdf;

class VisualizarEtiqueta
{
    public $mpdf;

    public function __construct()
    {
        $this->mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
        ]);
    }

    public function visualizar($id)
    {
        $etiquetas = new Etiquetas();
        $etiqueta = $etiquetas->newQuery()->findOrFail($id);

        if ($etiqueta->user_id != id_usuario_atual()) return redirect()->back();

        // Remetente
        $remetente = new Remetente($etiqueta->user_id);

        // Loja
        $loja = new Loja($etiqueta->lojas_id);

        // Destinatario
        $destinatario = new Destinatario($etiqueta->destinatarios_id, $etiqueta->enderecos_id);

        // QrCode
        $gerarQrCode = new GerarQrCode();
        $qrCode = $gerarQrCode->gerar($etiqueta->id, $etiqueta->user_id);

        $this->mpdf->SetTitle('Etiqueta - ' . $etiqueta->rastreio);
        $this->mpdf->SetAuthor('Expresso Flex');

        $this->mpdf->WriteHTML(
            view('pages.clientes.etiquetas.expressoflex.modelos.modelos_v1',
                compact('destinatario', 'qrCode', 'etiqueta', 'remetente', 'loja'))
        );

        $this->mpdf->Output('Etiqueta - ' . '$codRastreio' . '.pdf', 'I');

        unlink($qrCode);
    }
}
