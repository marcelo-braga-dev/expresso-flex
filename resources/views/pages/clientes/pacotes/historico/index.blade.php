<x-layout menu="pacotes" submenu="historico">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Histórico Mensal de Pacotes</h4>
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
                        <li class="list-group-item d-flex justify-content-between align-items-center row-clickable px-4">
                            <span>
                                {{ converterMes(date('m', strtotime($pacote[0]))) . '/' . date('Y', strtotime($pacote[0])) }}<br>
                                <small class="d-block">
                                    {{ count($pacote) }} pacotes
                                </small>
                                <a class="btn btn-link p-0 btn-sm"
                                   href="{{ route('clientes.pacotes.historico.dias', ['data' => "$pacote[0]"]) }}">
                                    Ver pacotes
                                </a>
                            </span>
                        </li>
                    @endforeach

                    @if (empty($pacotes))
                        <div class="col-auto text-center p-3">
                            <small>Não há histórico de pacotes.</small>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-layout>
