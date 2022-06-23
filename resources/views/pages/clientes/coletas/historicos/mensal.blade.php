<x-layout menu="coletas" submenu="historico">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Coletas do Mês</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($solicitacoes as $solicitacao)
                        <div class="list-group-item d-flex justify-content-between row-clickable align-items-center px-0">
                            <div class="col-8">
                                <p class="mb-0">
                                    <i class="fas fa-calendar-alt text-primary mr-2"></i>
                                    {{ date('d/m/Y', strtotime($solicitacao->updated_at)) }}
                                </p>
                                <small>
                                    ID: #{{ $solicitacao->id }}
                                </small>
                                <small class="d-block">
                                    Status: {{ get_status_coleta($solicitacao->status) }}
                                </small>
                            </div>
                            <div class="col-4">
                                <a class="small"
                                   href="{{ route('clientes.coletas.historicos.diario', ['id' => $solicitacao->id]) }} ">
                                    Ver pacotes
                                </a>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
</x-layout>
