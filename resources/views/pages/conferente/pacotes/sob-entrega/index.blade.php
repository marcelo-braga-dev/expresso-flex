<x-layout menu="pacotes" submenu="sendo-entregue">

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pacotes sendo Entregue</h4>
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
                    @foreach ($entregadores as $index => $entregador)
                        <li class="list-group-item row-clickable">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-12">
                                    <p class="mb-0">
                                        <i class="fas fa-motorcycle mr-2 text-black"></i>
                                        <b>{{ get_nome_usuario($index) }}</b>
                                    </p>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-auto">
                                    <small class="d-block mt-2">
                                        <i class="fas fa-box text-warning mr-2"></i>
                                        {{ count($entregador) }} pacotes.
                                    </small>
                                </div>
                                <div class="col-auto text-right">
                                    <a class="small pl-5" href="{{ route('conferentes.pacotes.sob-entrega.show', $index) }}">
                                        Detalhes
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @empty($entregadores)
                    <div class="col-auto text-center p-3">
                        <small>N??o h?? hist??rico de pacotes.</small>
                    </div>
                @endempty
            </div>
        </div>
    </div>
</x-layout>
