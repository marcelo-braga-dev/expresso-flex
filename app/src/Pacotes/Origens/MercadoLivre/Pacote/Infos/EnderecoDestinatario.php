<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote\Infos;

use App\src\Enderecos\CadastrarEndereco;
use App\src\Pacotes\Info\Endereco;

class EnderecoDestinatario
{
    private array $dados;

    public function __construct(array $dados)
    {
        $this->dados = $dados;
    }

    public function getEndereco()
    {
        $destinatario = $this->dados['receiver_address'];

        $endereco = new CadastrarEndereco();
        $endereco->rua($destinatario['street_name']);
        $endereco->numero($destinatario['street_number']);
        $endereco->complemento($destinatario['comment']);
        $endereco->cep($destinatario['zip_code']);
        $endereco->bairro($destinatario['neighborhood']['name']);
        $endereco->cidade($destinatario['city']['name']);
        $endereco->estado($destinatario['state']['name']);
        $endereco->longitude($destinatario['longitude']);
        $endereco->latitude($destinatario['latitude']);

        $id = $endereco->cadastrar();

        return new Endereco($id);
    }
}
