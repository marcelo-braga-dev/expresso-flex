@extends('layouts.admin', ['title' => 'Home'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <div class="row">
            {{-- Coletas --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Coletas</h5>
                                <span class="h2 font-weight-bold mb-0 d-block">
                                    Coletas em Aberto.
                                    {{-- @if ($coletasEmAberto['count']) --}}
                                    {{-- @else
                                        Não há coletas em aberto.
                                    @endif --}}
                                </span>
                                {{-- <small>Quantidade:</small> {{ $coletasEmAberto['count'] }} --}}
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-dolly"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-info" href="{{ route('entregadores.coletas.todas-coletas') }}">
                            Ver Coletas em Aberto
                        </a>
                    </div>
                </div>
            </div>

            {{-- Entregas --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Entregas
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Entregas para realizar
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="{{ route('entregadores.entrega.entrega-iniciadas') }}">
                            Ver Entregas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr>

    @endsection