<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Faturamento dos Clientes</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">

                <ul class="list-group list-group-flush">
                    @foreach ($clientes as $arg)
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center info-list px-4">
                            <div>
                                <p class="mb-0">
                                    {{ get_dados_usuario($arg['user_id'])->nome }}
                                </p>
                                <small class="d-block">
                                    Em aberto: R$ {{ number_format($arg['em_aberto'], 2, ',', '.')  }}
                                </small>
                                <small class="d-block">
                                    ID: #{{ $arg['user_id'] }}
                                </small>
                            </div>
                            <a class="btn btn-link p-0 btn-sm"
                               href="{{ route('admins.financeiros.historicoMes', ['id' => $arg['user_id']]) }}">
                                Ver detalhes
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
</x-layout>
