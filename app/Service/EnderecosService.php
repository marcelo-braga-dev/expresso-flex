<?php

namespace App\Service;

class EnderecosService
{
    public function getRegiaoCep(string $cep)
    {
        $key = 'grande_sao_paulo';

        if ($cep >= '01000000' && $cep <= '05999999') {
            $key = 'sao_paulo';
        }

        if ($cep >= '08000000' && $cep <= '08499999') {
            $key = 'sao_paulo';
        }

        return $key;
    }
    
    /*public function index()
    {
        $client = new Client(['verify' => false]);

        $response = $client->get('https://webservice.aldo.com.br/asp.net/ferramentas/integracao.ashx');

        $resposta = $response->getBody()->getContents();

        return view('teste', compact('resposta'));
    }

    public function apiCep() //Request $request
    {
        $endereco = [];

        $ruas = $this->pesquisaRua();

        $bairro = $this->pesquisaBairro();

        $cidade = $this->pesquisaCidade();

        foreach ($ruas as $rua) {
            if (!empty($rua->id_bairro)) {
                $endereco[] =
                    $rua->logradouro . ', ' .
                    $bairro[$rua->id_bairro]['bairro'] . ' - ' .
                    $cidade[$rua->id_cidade]['cidade'];
            }
        }
        //        echo '<pre>';
        //        print_r($endereco);
        //        echo '</pre>';
        print_r(json_encode($endereco));
    }

    public function pesquisaRua()
    {
        $ruas = DB::table('cepbr_endereco')
            ->where('id_cidade', '=', '9668')
            ->orderBy('logradouro', 'ASC')
            ->get(['logradouro', 'complemento', 'id_bairro', 'id_cidade']);
        //->toJson();
        return $ruas;
    }

    public function pesquisaBairro()
    {
        $bairros = DB::table('cepbr_bairro')
            //->where('id_bairro', '=', $idBairro)
            ->get()
            ->toArray();

        foreach ($bairros as $arg) {
            $bairro[$arg->id_bairro] = [
                'id_bairro' => $arg->id_bairro,
                'bairro' => $arg->bairro
            ];
        }

        return $bairro;
    }

    public function pesquisaCidade()
    {
        $cidades = DB::table('cepbr_cidade')
            ->where('uf', '=', 'SP')
            ->get()
            ->toArray();

        foreach ($cidades as $arg) {

            $nome = str_replace('São Paulo', 'SP', $arg->cidade);

            $cidade[$arg->id_cidade] = [
                'id_cidade' => $arg->id_cidade,
                'cidade' => $nome
            ];
        }

        return $cidade;
    }

    public function pesquisaFaixaCidade(string $cep)
    {
        $faixa = DB::table('cepbr_faixa_cidades')
            ->where('cep_inicial', '<', $cep)
            ->orderBy('cep_inicial', 'DESC')
            ->first();

        return $faixa;
    }

    public function pesquisaFaixaBairro(string $cep)
    {
        $faixa = DB::table('cepbr_faixa_bairros')
            ->where('cep_inicial', '<', $cep)
            ->orderBy('cep_inicial', 'DESC')
            ->first();

        return $faixa;
    }

    public function getCidade(string $id)
    {
        $cidade = DB::table('cepbr_cidade')
            ->where('id_cidade', '=', $id)
            ->first();

        return $cidade;
    }

    public function getEnderecoCompleto(string $cep, string $numero)
    {
        $cep = preg_replace('/\D/', '', $cep);

        $rua = DB::table('cepbr_endereco')
            ->where('cep', '=', $cep)
            ->first();

        if (empty($rua)) return 'Endereço não encontrado.';

        if (!empty($rua->id_bairro)) {
            if ($rua->id_bairro > 0) {
                $bairro = DB::table('cepbr_bairro')
                    ->where('id_bairro', '=', $rua->id_bairro)
                    ->first();
                $enderecoBairro = $bairro->bairro;
            }
        }

        if (!empty($rua->id_cidade)) {
            $cidade = DB::table('cepbr_cidade')
                ->where('id_cidade', '=', $rua->id_cidade)
                ->first();
            $enderecoCidade = $cidade->cidade;
        }

        $resposta = $rua->logradouro .
            ', nº ' . $numero . ', ' .
            $enderecoBairro .
            ', Cep: ' .  $cep . ', ' .
            $enderecoCidade . ' - SP';

        return $resposta;
    }*/
}
