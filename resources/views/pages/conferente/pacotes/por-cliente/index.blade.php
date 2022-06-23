<x-layout menu="pacotes" submenu="por-cliente">

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pacotes de hoje dos Clientes</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                <ul class="list-group list-group-flush">
                    @foreach ($clientes as $index => $cliente)
                        <li class="list-group-item row-clickable">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-12">
                                    <p class="mb-0">
                                        <i class="fas fa-user mr-2 text-primary"></i>
                                        <b>{{ get_nome_usuario($index) }}</b>
                                    </p>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-auto">
                                    <small class="d-block mt-2">
                                        <i class="fas fa-box text-warning mr-2"></i>
                                        {{ count($cliente) }} pacotes.
                                    </small>
                                </div>
                                <div class="col-auto text-right">
                                    <a class="small pl-5"
                                       href="{{ route('conferentes.pacotes.por-cliente.show', $index) }}">
                                        Detalhes
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @empty($clientes)
                    <div class="col-auto text-center p-3">
                        <small>Não há histórico de pacotes.</small>
                    </div>
                @endempty
            </div>
        </div>
    </div>
</x-layout>
