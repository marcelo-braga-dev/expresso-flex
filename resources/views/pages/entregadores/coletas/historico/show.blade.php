<x-layout menu="coletas" submenu="historico-coletas">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card mb-4">
            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Irformações da Coleta</h3>
                    <a class="btn btn-primary btn-sm text-white" href="{{ url()->previous() }}">
                        Voltar
                    </a>
                </div>
            </div>

            <div class="card-body">
                <!-- Cliente -->
                <div class="card p-3 mb-4">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="text-sm mb-0">
                                <b>Cliente:</b>
                                {{ get_dados_usuario($coleta->user_id)->name }}
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="text-sm mb-0">
                                <b>Telefone:</b>
                                @if (!empty($coleta->loja))
                                    {{ get_loja($coleta->loja, $coleta->user_id)->celular }}
                                @endif
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="text-sm mb-0">
                                <b>Endereço:</b>
                                {{ get_endereco_loja($coleta->loja) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card p-3 mb-4">
                    <div class="row justify-content-between px-3">
                        <h3 class="mb-3">Pacotes Coletados</h3>
                        <small>Quantidade: {{ count($pacotes) }} pacotes.</small>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Código de Rastreio</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Data</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pacotes as $pacote)
                                        <tr>
                                            <th scope="row">
                                                {{ $pacote->rastreio }}
                                            </th>
                                            <td>
                                                @if (pacoteStatusHistoricoExiste($pacote->id, $statusFinalizado))
                                                    <span class="text-success">
                                                        <i class="fas fa-check"></i>
                                                        Coleta finalizada
                                                    </span>
                                                @elseif($pacote->status == $statusColetado)
                                                    <span class="text-primary">
                                                        <i class="fas fa-dolly"></i>
                                                        {{ get_status_pacote($pacote->status) }}
                                                    </span>
                                                    @else
                                                    <span class="text-danger">
                                                        <i class="fas fa-times"></i>
                                                    {{ get_status_pacote($pacote->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ date('d/m/y H:i', strtotime($pacote->updated_at)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
