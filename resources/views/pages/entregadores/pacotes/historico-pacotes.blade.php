<x-layout menu="historico" submenu="historico-pacotes">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Histórico de Pacotes</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center row-clickable px-4">
                            <span>
                                {{ date('d/m/Y', strtotime($pacote[0])) }}<br>
                                <small class="d-block">
                                    {{ count($pacote) }} pacotes
                                </small>
                                <a class="btn btn-link p-0 btn-sm"
                                    href="{{ route('entregadores.pacotes.historico-dia', ['data' => "$pacote[0]"]) }}">
                                    Ver pacotes
                                </a>
                            </span>
                        </li>
                    @endforeach
                </ul>

                @empty($pacotes)
                    <div class="row justify-content-center">
                        <div class="col-auto p-3">
                            <small class="text-muted">
                                Não há histórico de entregas.
                            </small>
                        </div>
                    </div>
                @endempty
            </div>
        </div>


    </div>
    </x-layout>
