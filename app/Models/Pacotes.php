<?php

namespace App\Models;

use App\src\Pacotes\Info\Cadastrar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Pacotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rastreio',
        'codigo',
        'coleta',
        'endereco',
        'entregador',
        'destinatario',
        'status',
        'cep',
        'origem',
        'descricao',
    ];

    public function cadastrar(Cadastrar $pacote)
    {
        DB::beginTransaction();
        try {
            $pacoteCadastrado = $this->newQuery()
                ->create([
                    'user_id' => $pacote->cliente(),
                    'rastreio' => $pacote->rastreio(),
                    'codigo' => $pacote->codigo(),
                    'coleta' => $pacote->coleta(),
                    'endereco' => $pacote->endereco(),
                    'entregador' => $pacote->entregador(),
                    'destinatario' => $pacote->destinatario(),
                    'status' => $pacote->status(),
                    'cep' => $pacote->cep(),
                    'origem' => $pacote->origem(),
                    'descricao' => $pacote->descricao(),
                ]);

            DB::commit();
            atualizarHistoricoPacote($pacote->cliente(), $pacoteCadastrado->id, $pacote->status());

            return $pacoteCadastrado->id;
        } catch (QueryException $e) {
            DB::rollback();
            if ($e->getCode() == 23000) session()->flash('erro', 'Pacote já cadastrado');
        }
    }

    public function entregador(int $id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->first('nome');
    }

    public function mercadoriasPorRemetente()
    {
        return $this::where('remetente', '=', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->get();// ->paginate(15)
    }

//    public function getDestinatario(int $idPacote)
//    {
//        $destinatarios = new Destinatarios;
//
//        $codigoInterno = $destinatarios->where('pacotes_id', '=', $idPacote)->get();
//        return !empty($codigoInterno[0]->nome) ? $codigoInterno[0]->nome : '';
//    }

    public function destinatario()
    {
        return $this->hasOne(Destinatarios::class);
    }

    public function endereco()
    {
        return new Enderecos();
    }

    public function historico()
    {
        return $this->hasMany(PacotesHistoricos::class);
    }
}
