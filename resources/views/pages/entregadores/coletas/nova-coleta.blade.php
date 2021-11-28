@extends('layouts.admin', ['title' => 'Criar Solicitações de Coleta'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 px-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="badge badge-info">Coleta de Pacotes <i class="fas fa-dolly"></i></small>
                        <h4 class="card-title text-uppercase mb-0">
                            Criar Solicitações de Coleta
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('entregadores.coletas.criar-coleta') }}"> @csrf @method('put')
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <select class="form-control select2" name="id">

                                <option>Selecione o Cliente</option>

                                @foreach ($clientes as $cliente)
                                    {{-- <optgroup class="border" label="{{ get_nome_usuario($cliente['user_id']) }}"> --}}

                                        @foreach ($cliente['lojas'] as $loja)
                                            <option value="{{ $loja['id'] }}">
                                                {{ get_nome_usuario($cliente['user_id']) .' [' . $loja['nome'] . ']' }}
                                            </option>
                                        @endforeach

                                    {{-- </optgroup> --}}
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection