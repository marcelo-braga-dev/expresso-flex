<?php

namespace App\src\Pacotes\Status;

use App\Models\PacotesHistoricos;

class HistoricoStatusPacote
{
    private int $pacote;
    private string $status;

    public function __construct(int $pacote, string $status)
    {
        $this->pacote = $pacote;
        $this->status = $status;
        $this->armazenar();
    }

    private function armazenar()
    {
        $historico = new PacotesHistoricos();
        $historico->newQuery()
            ->create([
                'user_id' => id_usuario_atual(),
                'pacotes_id' => $this->pacote,
                'status' => $this->status
            ]);
    }
}
