<?php

namespace App\src\Etiquetas\ExpressoFlex\PDF;

use App\Models\Etiquetas;
use App\src\Etiquetas\Status\Visualizada;
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

    public function visualizar($idEtiquetas)
    {
        foreach ($idEtiquetas as $idEtiqueta) {
            $etiquetas = new Etiquetas();
            $etiqueta = $etiquetas->newQuery()->find($idEtiqueta);

            if (empty($etiqueta) || $etiqueta->user_id != id_usuario_atual()) {
                exit('Você não pode acessar essa etiqueta.');
            }

            $remetente[$idEtiqueta] = new Remetente($etiqueta->user_id);

            $loja[$idEtiqueta] = new Loja($etiqueta->lojas_id);

            $destinatario[$idEtiqueta] = new Destinatario($etiqueta->destinatarios_id, $etiqueta->enderecos_id);

            $qrCode[$idEtiqueta] = (new GerarQrCode())->gerar($etiqueta->id, $etiqueta->user_id);
            $rastreio[$idEtiqueta] = $etiqueta->rastreio;

            (new Etiquetas())->newQuery()
                ->update(['status' => (new Visualizada())->getStatus()]);
        }

        $this->mpdf->SetTitle('Etiqueta - ' . $etiqueta->rastreio);
        $this->mpdf->SetAuthor('Expresso Flex');

        $paginas = [];
        $i = 0;
        $r = 0;
        foreach ($idEtiquetas as $idEtiqueta) {
            if ($i >= 3) {
                $r++;
                $i = 0;
            }
            $i++;
            $paginas[$r][] = $idEtiqueta;
        }

        $this->mpdf->WriteHTML(
            view('pages.clientes.etiquetas.expressoflex.modelos.modelos_v1',
                compact('destinatario', 'qrCode', 'etiqueta',
                    'remetente', 'loja', 'idEtiquetas', 'rastreio', 'paginas'))
        );

        $this->mpdf->Output('Etiquetas_Expresso_Flex_' . uniqid() . '.pdf', 'I');

        foreach ($qrCode as $path) {
            unlink($path);
        }
    }
}
