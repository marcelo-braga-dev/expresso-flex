@extends('layouts.admin', ['title' => 'Todos Contas Vinculadas'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="card bg-secondary">
            <div class="card-header bg-white">
                <h3 class="mb-0 text-principal">
                    Suas Contas Mercado Livre Vinculadas
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">

                        @include('layouts.componentes.alerts')

                        @foreach ($contas as $conta)
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="d-block">
                                            Conta Mercado Livre
                                        </span>
                                        <span class="d-block">
                                            <small>ID da Conta: {{ $conta['seller_id'] }}</small>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="dropdown">
                                            <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="">Excluir</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach

                        @if (!count($contas))
                            <div class="row">
                                <div class="col-auto mx-auto p-3">
                                    <small class="text-muted">
                                        Não há contas vinculadas.
                                    </small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection
