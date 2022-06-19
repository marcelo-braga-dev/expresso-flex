<?php

namespace App\Http\Controllers\Clientes\Coletas;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;

class QrCodeLojasController extends Controller
{
    public function index(Request $request)
    {
        $id = id_usuario_atual();
        $qrCode = '';
        $loja_sel = $request->id_loja;

        $clsLojasClientes = new LojasClientes();

        $lojas = $clsLojasClientes->query()
            ->where('user_id', '=', id_usuario_atual())
            ->where('status', '=', '1')
            ->get(['id', 'nome']);

        if (empty($lojas[0]['id'])) {
            return view('pages.clientes.coletas.lojas.qrcode', compact('qrCode'));
        }

        $loja_sel = $loja_sel ? $loja_sel : $lojas[0]['id'];

        $options = new QROptions([
            'version' => 6,
            'eccLevel' => QRCode::ECC_L,
            'outputType' => QRCode::OUTPUT_IMAGE_JPG,
            'imageBase64' => true
        ]);

        $data =
            '{' .
                '"user_id":"' . $id . '",' .
                '"id_ponto_coleta":"' . $loja_sel . '",' .
                '"origem":"ponto_coleta"' .
            '}';

        $QrCode = new QRCode($options);
        $qrCode = $QrCode->render($data);

        return view('pages.clientes.coletas.lojas.qrcode', compact('qrCode', 'lojas', 'loja_sel'));
    }
}
