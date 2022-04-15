<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacotesHistoricos extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'pacotes_id', 'status', 'value'];

    public function novo(int $id, int $pacote, string $status)
    {
        $metasValues = new MetaValues();
        $mensagem = $metasValues->newQuery()
            ->where('meta_key', '=', $status)->first('value');

        $this->newQuery()
            ->create([
                'user_id' => $id,
                'pacotes_id' => $pacote,
                'status' => $status,
                'value' => $mensagem->value
            ]);
    }
}
