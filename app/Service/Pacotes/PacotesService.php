<?php
//
//namespace App\Service\Pacotes;
//
//use App\Models\Pacotes;
//use App\Models\PacotesHistoricos;
//use App\src\Pacotes\CustoFretePacote;
//use App\src\Pacotes\StatusPacote;
//
//class PacotesService
//{
//    public function getPacotesEntrega(string $status)
//    {
//        $classPacotes = new Pacotes();
//
//        $date = date('Y-m-d');
//
//        return $classPacotes->query()
//            ->where('entregador', '=', id_usuario_atual())
//            ->where('status', '=', $status)
//            ->whereDate('updated_at', '>=', $date)
//            ->orderBy('cep', 'ASC')
//            ->get();
//    }
//
//    public function alteraStatusPacote(int $id, string $status)
//    {
//        $pacote = Pacotes::find($id);
//
//        $pacote->update(['status' => $status]);
//
//        $historico = new StatusPacote();
//
//        $historico->setHistorico(id_usuario_atual(), $pacote->id, $status);
//
//        if ($status == 'pacote_entrega_finalizado') {
//            $custo = new CustoFretePacote();
//            $custo->setPrecoFretePacote($pacote->id);
//        }
//
//        if ($status == 'pacote_entrega_iniciado') {
//            $pacote->update(['entregador' => id_usuario_atual()]);
//        }
//    }
//
//    // Retorna dados com QrCode
//    public function pacoteQrCode(string $id, string $origem)
//    {
//        if ($origem == 'mercado_livre') {
//            $pacotes = new Pacotes();
//
//            $pacote = $pacotes->query()
//                ->where('codigo', '=', $id)
//                ->where('origem', '=', 'mercado_livre')
//                ->first();
//        }
//
//        if ($origem == 'expresso_flex') {
//            $pacote = Pacotes::find($id);
//        }
//
//        return $pacote;
//    }
//}
