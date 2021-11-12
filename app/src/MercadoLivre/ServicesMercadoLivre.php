<?php

namespace App\src\MercadoLivre;

use App\Models\Pacotes;

class ServicesMercadoLivre extends RecursosApiMercadoLivre
{
    public function getEndereco(?int $idShipping, int  $senderId)
    {
        $recursos = new RecursosApiMercadoLivre();

        //        $hashCode = $request->hash_code;
        //        $securityDigit = $request->security_digit;

        $verificaDuplicidade = $this->verificaDuplicidade($idShipping);

        if ($verificaDuplicidade) {
            $status = get_status_pacote($verificaDuplicidade);
            session()->flash('erro', "Já foi realizado o cadastro da coleta desse pacote. \n\r
            - Status atual desse pacote: {$status}.");
            return [];
        }

        $dadosRemessa = $recursos->infoRemessa($idShipping, $senderId);

        if (!empty($dadosRemessa)) {
            $dados = $dadosRemessa['receiver_address'];

            $endereco['rua'] = $dados['street_name'];
            $endereco['numero'] = $dados['street_number'];
            $endereco['complemento'] = $dados['comment'];
            $endereco['cep'] = $dados['zip_code'];
            $endereco['bairro'] = $dados['neighborhood']['name'];
            $endereco['cidade'] = $dados['city']['name'];
            $endereco['estado'] = $dados['state']['name'];
            $endereco['latitude'] = $dados['latitude'];
            $endereco['longitude'] = $dados['longitude'];

            $endereco['destinatario'] = $dados['receiver_name'];
            $endereco['telefone'] = $dados['receiver_phone'];

            return $endereco;
        }

        if (empty(session('erro'))) session()->flash('erro', 'Dados do pacote não encontrado.');

        return [];
    }

    private function verificaDuplicidade($codigo)
    {
        $pacotes = new Pacotes();

        $verificaExistencia = $pacotes->query()
            ->where('codigo', '=', $codigo)
            ->where('origem', '=', 'mercado_livre')
            ->first();

        if (!empty($verificaExistencia->status)) {
            return $verificaExistencia->status;
        }
        return false;
    }
}
