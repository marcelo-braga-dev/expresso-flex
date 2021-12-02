<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\LojasClientes;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function getQrcodeUsuario(Request $request)
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
            return view('pages.cliente.perfil.qr-code-usuario', compact('qrCode'));            
        } 
        
        $loja_sel = $loja_sel ? $loja_sel : $lojas[0]['id'];

        $options = new QROptions([
            'version' => 6,
            'eccLevel' => QRCode::ECC_L,
            'outputType' => QRCode::OUTPUT_IMAGE_JPG,
            'imageBase64' => true
        ]);

        $data =
            '{
                "id" : "' . $id . '",
                "id_loja": "' . $loja_sel . '",
                "origem" : "identifica_usuario"
            }';

        $QrCode = new QRCode($options);
        $qrCode = $QrCode->render($data);

        return view('pages.cliente.perfil.qr-code-usuario', compact('qrCode', 'lojas', 'loja_sel'));
    }
}
