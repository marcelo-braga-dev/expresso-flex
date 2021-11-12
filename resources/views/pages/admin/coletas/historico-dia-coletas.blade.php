@extends('layouts.admin', ['title' => 'Histórico de Coletas', 'menu_suspenso' => 'coletas'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Histórico de Coletas</h4>
                        {{ date('d/m/Y', strtotime($dia)) }}
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($solicitacoes as $solicitacao)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-4">
                            <span>
                                <p class="mb-0">
                                    <b>Cliente: {{ get_dados_usuario($solicitacao->user_id)->nome }}</b>
                                </p>
                                <p class="text-mb mb-0">
                                    {{ get_endereco_loja($solicitacao->loja) }}
                                </p>
                                <small class="d-block">
                                    Entregador: 
                                    @if (!empty($solicitacao->entregador))
                                    {{ get_dados_usuario($solicitacao->entregador)->nome }}
                                    @endif
                                </small>
                                <small class="d-block text-success">
                                        {{ get_status_coleta($solicitacao->status) }}
                                </small>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
