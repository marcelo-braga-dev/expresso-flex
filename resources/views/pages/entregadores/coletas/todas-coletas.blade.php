@extends('layouts.admin', ['title' => 'Solicitações de Coleta'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 px-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="badge badge-info">Coleta de Pacotes <i class="fas fa-dolly"></i></small>
                        <h4 class="card-title text-uppercase mb-0">
                            Solicitações de Coleta
                        </h4>
                        <span class="h3 font-weight-bold mb-0"></span>
                        <small class="text-success">Para Aceitar: {{ $coletasParaAceitar['count'] }}</small>
                        <small class="text-muted"> | </small>
                        <small class="text-primary">Em Andamento: {{ count($solicitacoesAceitas) }}</small>
                    </div>
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
                    <div class="col-auto d-none d-md-block">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dolly"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white px-3 border-bottom text-right mb-2">
                <a href="{{ route('entregadores.coletas.criar-coleta') }}" class="btn btn-link btn-sm">
                    Criar Solicitação de Coleta
                </a>
            </div>

            <div class="card-body p-1">
                <div class="px-lg-4">
                    <div class="row mb-4">
                        <div class="col-lg-12">

                            @if ($coletasParaAceitar['count'])
                                <h5 class=" text-success">Coletas para Aceitar</h5>
                            @endif

                            @foreach ($coletasParaAceitar['solicitacoes'] as $solicitacoes)
                                @if (count($solicitacoes['coletas']))
                                    <small class="text-muted">Região: {{ $solicitacoes['regiao'] }}</small>
                                    @foreach ($solicitacoes['coletas'] as $coleta)

                                        <div class="card mb-3 border-success info-search">
                                            <div class="row justify-content-between align-items-center p-3">
                                                <div class="col-md-9 mb-2">
                                                    <p class="mb-0">
                                                        <i class="fas fa-user mr-2 text-primary"></i>
                                                        <b>{{ get_nome_usuario($coleta['user_id']) }}
                                                            ({{ get_info_ponto_coleta($coleta['loja'])->nome }})</b>
                                                    </p>

                                                    <p class="mb-0">
                                                        <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                                        {{ get_endereco_loja($coleta['loja']) }} - Cep:
                                                        {{ formatar_cep($coleta['cep']) }}
                                                    </p>

                                                    <small class="d-block text-muted">
                                                        <i class="fas fa-hashtag mr-2 text-primary"></i>
                                                        ID da solicitação: #{{ $coleta['id'] }}
                                                    </small>

                                                </div>
                                                <div class="col-md-3">
                                                    <form method="POST"
                                                        action="{{ route('entregadores.coletas.aceitar-coleta') }}">
                                                        @csrf @method('put')
                                                        <input type="hidden" name="id_coleta"
                                                            value="{{ $coleta['id'] }}">
                                                        <button type="submit" class="btn btn-success btn-block">
                                                            Aceitar Coleta
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr class="my-2">
                                @endif
                            @endforeach

                            @foreach ($solicitacoesAceitas as $solicitacao)
                                <div class="card my-3 shadow-sm border-primary info-search @if (!$solicitacao['status']) bg-light @endif">
                                    <div class="row p-3">
                                        <div class="col-md-9">
                                            @if (!$solicitacao['status'])
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="alert alert-danger">
                                                            COLETA CANCELADA PELO CLIENTE
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <p class="mb-0">
                                                <i class="fas fa-user mr-2 text-primary"></i>
                                                <b>{{ get_nome_usuario($solicitacao['user_id']) }}
                                                    ({{ get_info_ponto_coleta($solicitacao['loja'])->nome }})</b>
                                            </p>

                                            <p class="mb-0">
                                                <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                                {{ get_endereco_loja($solicitacao['loja']) }} -
                                                Cep: {{ formatar_cep($solicitacao['cep']) }}
                                            </p>

                                            <small class="d-block text-muted">
                                                <i class="fas fa-hashtag mr-2 text-primary"></i>
                                                ID da solicitação: #{{ $solicitacao['id'] }}
                                            </small>

                                            <form method="POST"
                                                action="{{ route('entregadores.coletas.cancelar-coleta') }}">
                                                @csrf @method('PUT')
                                                <hr class="d-none cancelar-coleta">
                                                <label class="d-none cancelar-coleta mt-2">
                                                    Motivo do cancelamento
                                                </label>
                                                <textarea class="form-control mb-2 d-none cancelar-coleta"
                                                    name="motivo_cancelamento"
                                                    placeholder="Motivo do cancelamento da coleta" rows="5" minlength="10"
                                                    required></textarea>
                                                <div class="text-center mb-3">
                                                    <button type="submit" name="id_coleta"
                                                        value="{{ $solicitacao['id'] }}"
                                                        class="btn btn-success d-none cancelar-coleta">
                                                        Enviar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            @if ($solicitacao['status'])
                                                <div>
                                                    <a class="btn btn-primary btn-block mb-3"
                                                        href="{{ route('entregadores.pacotes.cadastrar-pacotes', $solicitacao['id']) }}">
                                                        Cadastrar Pacotes
                                                    </a>

                                                    <button type="button"
                                                        class="btn btn-danger btn-block btn-sm btn-cancelar">
                                                        Cancelar Coleta
                                                    </button>
                                                </div>
                                            @else
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-block btn-sm btn-cancelar">
                                                        Excluir
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if (!$coletasParaAceitar['count'] && !$solicitacoesAceitas)
                    <div class="row justify-content-center mb-3">
                        <div class="col-auto">
                            <small class="text-muted">
                                Não há solicitações de coletas.
                            </small>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <script>
        $(function() {
            $('.btn-cancelar').click(function() {
                $(this).parent().parent().parent().find('.cancelar-coleta').toggleClass('d-none');
            });
        });
    </script>
@endsection
