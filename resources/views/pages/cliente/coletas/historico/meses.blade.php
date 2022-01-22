<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Histórico de Coletas</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dolly"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($solicitacoes as $solicitacao)
                        <li class="list-group-item d-flex justify-content-between align-items-center info-list px-4">
                            <span>
                                {{ date('m/Y', strtotime($solicitacao[0])) }}<br>
                                <small class="d-block">
                                    {{ count($solicitacao) }} coletas
                                </small>
                            </span>
                            <a class="btn btn-link p-0 btn-sm"
                                href="{{ route('cliente.coleta.historico.dias', ['data' => "$solicitacao[0]"]) }}">
                                Ver detalhes
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>
