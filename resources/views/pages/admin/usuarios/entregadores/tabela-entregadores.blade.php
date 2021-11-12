@extends('layouts.admin', ['title' => 'Todos Entregadores'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 justify-content-between">
                        <div class="row justify-content-between align-items-center px-3">
                            <div>
                                <h3 class="mb-0">Entregadores Cadastrados</h3>
                                <a class="btn btn-primary" href="{{ route('admin.usuarios.entregador.new') }}">
                                    Cadastrar Entregador
                                </a>
                            </div>
                            <div>
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="search" placeholder="Pesquisar...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('layouts.componentes.alerts')

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">ID</th>
                                    <th scope="col" class="sort" data-sort="budget">Entregador</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                    <th scope="col" class="sort" data-sort="completion">Áreas de Coleta</th>
                                    <th scope="col" class="sort" data-sort="completion">Áreas de Entrega</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                @foreach ($entregadores as $entregador)
                                    <tr>
                                        <td scope="row">
                                            #{{ $entregador->id }}
                                        </td>
                                        <td>
                                            <p class="text-sm mb-1">
                                                <b>{{ $entregador->nome }}</b><br>
                                                {{ $entregador->email }}
                                            </p>
                                        </td>
                                        <td @if (!$entregador->status) style="color: rgba(255,3,3,0.64)" @endif>
                                            @if ($entregador->status)
                                                <i class="fas fa-check text-success"></i>
                                            @else
                                                <i class="fas fa-times text-danger"></i>
                                            @endif
                                        </td>
                                        <td style="white-space: normal">
                                            @isset($regioes[$entregador->id]['regiao_coleta'])
                                                @foreach ($regioes[$entregador->id]['regiao_coleta'] as $regiao)
                                                    {{ $regiao }},
                                                @endforeach
                                            @endisset
                                        </td>
                                        <td style="white-space: normal">
                                            @isset($regioes[$entregador->id]['regiao_entrega'])
                                                @foreach ($regioes[$entregador->id]['regiao_entrega'] as $regiao)
                                                    {{ $regiao }},
                                                @endforeach
                                            @endisset
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.entregador.edit', ['id' => "$entregador->id"]) }}">
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.conferente.info', ['id' => "$entregador->id"]) }}">
                                                        Detalhes
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
