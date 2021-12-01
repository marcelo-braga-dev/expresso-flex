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
                                    <th scope="col" class="sort" data-sort="completion">Áreas de Coleta</th>
                                    <th scope="col" class="sort" data-sort="completion">Áreas de Entrega</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                @foreach ($entregadores as $usuario)
                                    <tr>
                                        <td scope="row">
                                            #{{ $usuario->id }}
                                        </td>
                                        <td>
                                            <b>{{ $usuario->nome }}</b><br>
                                            {{ $usuario->email }}<br>
                                            @if (!empty($novaConta[$usuario->email]))
                                                <a
                                                    href="{{ route('admin.usuarios.clientes.info-clientes', ['id' => "$usuario->id"]) }}">
                                                    <small>O usuário ainda não ativou a conta.</small>
                                                </a>
                                            @endif
                                        </td>
                                        <td style="white-space: normal">
                                            @isset($regioes[$usuario->id]['regiao_coleta'])
                                                @foreach ($regioes[$usuario->id]['regiao_coleta'] as $regiao)
                                                    {{ $regiao }},
                                                @endforeach
                                            @endisset
                                        </td>
                                        <td style="white-space: normal">
                                            @isset($regioes[$usuario->id]['regiao_entrega'])
                                                @foreach ($regioes[$usuario->id]['regiao_entrega'] as $regiao)
                                                    {{ $regiao }},
                                                @endforeach
                                            @endisset
                                        </td>
                                        <td>
                                            <label class="custom-toggle">
                                                <input type="checkbox" class="status-usuario" value="{{ $usuario->id }}"
                                                    @if ($usuario->status) checked @endif>
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                                    data-label-on="Yes"></span>
                                            </label>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.entregador.edit', ['id' => "$usuario->id"]) }}">
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.conferente.info', ['id' => "$usuario->id"]) }}">
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
        @include('pages.admin.usuarios.partials.modalAlteraStatus')
    </div>
@endsection
