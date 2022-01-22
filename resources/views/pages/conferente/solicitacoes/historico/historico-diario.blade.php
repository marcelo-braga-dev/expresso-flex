<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-2">Histórico de Solicitações</h4>
                        {{ date('d/m/Y', strtotime($dia)) }}
                    </div>
                    <div class="form-group m-0">
                        <div class="input-group input-group-alternative input-group-merge bg-white">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="search-list" placeholder="Pesquisar pacote...">
                        </div>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('conferente.pacotes.historico') }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">

                    @foreach ($solicitacoes as $pacote)
                        <li class="list-group-item info-list info-list">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-12 col-md-10">
                                    <p class="mb-0">
                                        <i class="fas fa-user mr-2 text-primary"></i>
                                        <b>
                                            {{ get_nome_usuario($pacote->user_id) }}
                                            [{{ get_nome_loja($pacote->loja) }}]
                                        </b>
                                    </p>

                                    <p class="mb-0">
                                        <i class="fas fa-motorcycle mr-2 text-dark"></i>
                                        @if ($pacote->entregador)
                                            {{ get_nome_usuario($pacote->entregador) }}
                                        @endif
                                    </p>

                                    <p class="mb-0">
                                        <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                        {{ get_endereco_loja($pacote->loja) }}
                                    </p>

                                    <p class="mb-0">
                                        <i class="fas fa-box mr-2 text-warning"></i>
                                        @if (!empty($pacotes[$pacote->id]))
                                            {{ count($pacotes[$pacote->id]) }} pacotes coletados.
                                        @else
                                            0 pacotes.
                                        @endif
                                    </p>

                                    <div class="row mt-2">
                                        <div class="col-auto">
                                            <small class="text-success">
                                                <i class="fas fa-dolly mr-2"></i>
                                                {{ get_status_coleta($pacote->status) }}
                                            </small>
                                        </div>
                                        <div class="col-auto">
                                            @if (!empty($pacote->texto))
                                                <small class="text-danger">
                                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                                    {{ $pacote->texto }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
    </x-layout>
