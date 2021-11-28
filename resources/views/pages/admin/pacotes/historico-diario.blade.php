@extends('layouts.admin', ['title' => 'Histórico de Pacotes', 'menu_suspenso' => 'pacotes'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-2">Histórico de Pacotes</h4>
                        {{ date('d/m/Y', strtotime($dia)) }}
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        @include('layouts.componentes.list-pacotes', ['link' => 'admin.pacotes.detalhes'])
                    @endforeach
                </ul>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection