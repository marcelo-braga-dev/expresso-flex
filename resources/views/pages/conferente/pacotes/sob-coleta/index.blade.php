<meta http-equiv="refresh" content="3">
<x-layout menu="pacotes" submenu="sendo-coletados">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pacotes para Checkin</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-auto">
                        <div class="form-group m-0 pt-2">
                            <div class="input-group input-group-alternative input-group-merge bg-white">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control" id="search-list" placeholder="Pesquisar...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                @foreach ($entregadores as $index => $entregador)
                    <div class="row row-clickable bg-white m-1 mb-2 p-3">
                        <div class="col-12">
                            <div class="row">
                                <p class="mb-0">
                                    <i class="fas fa-motorcycle mr-2 text-black"></i>
                                    <b>{{ get_nome_usuario($index) }}</b>
                                </p>
                            </div>
                            <div class="row justify-content-between align-items-center">
                                <p class="d-block mb-0">
                                    <i class="fas fa-box text-warning mr-2"></i>
                                    Faltam <span class="text-lg"><b>{{ count($entregador) }}</b></span> pacotes.
                                </p>
                                <a class="small pl-5"
                                   href="{{ route('conferentes.pacotes.sob-coleta.show', $index) }}">
                                    Ver pacotes
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @empty($entregadores)
                    <div class="col-auto text-center p-3">
                        <small>Não há histórico de pacotes.</small>
                    </div>
                @endempty
            </div>
        </div>
    </div>
</x-layout>
