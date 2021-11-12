<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rastreio',
        'codigo',
        'coleta',
        'entregador',
        'destinatario',
        'status',
        'texto',
        'regiao',
        'origem',
        'descricao',
        'loja'
    ];

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
