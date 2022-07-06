<?php

namespace App\Models;

use App\src\Pacotes\StatusPacotes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacotesHistoricos extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'pacotes_id', 'status', 'value'];

    public function novo(int $id, int $pacote, string $key, $mensagem)
    {
        $status = (new StatusPacotes())->status();

        $this->newQuery()
            ->create([
                'user_id' => $id,
                'pacotes_id' => $pacote,
                'status' => $key,
                'value' => $mensagem
            ]);
    }
}
