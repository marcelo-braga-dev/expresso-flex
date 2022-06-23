<x-layout menu="historico" submenu="historico-coletas">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
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
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center row-clickable px-4">
                            <span>
                                {{ date('d/m/Y', strtotime($solicitacao[0])) }}<br>
                                <small class="d-block">
                                    {{ count($solicitacao) }} coletas
                                </small>
                                <a class="btn btn-link p-0 btn-sm"
                                    href="{{ route('entregadores.coletas.historico-coleta-dia', ['data' => "$solicitacao[0]"]) }}">
                                    Ver coletas
                                </a>
                            </span>
                        </li>
                    @endforeach

                    @empty($solicitacoes)
                        <div class="row justify-content-center">
                            <div class="col-auto p-3">
                                <small class="text-muted">
                                    Não há histórico de coletas.
                                </small>
                            </div>
                        </div>
                    @endempty
                </ul>
            </div>
        </div>


    </div>
    </x-layout>
