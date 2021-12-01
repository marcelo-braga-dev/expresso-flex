@extends('layouts.admin', ['title' => 'Todos Conferentes', 'menu_suspenso' => 'usuarios'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row justify-content-between align-items-center px-3">
                            <div>
                                <h3 class="mb-0">Conferente Cadastrados</h3>
                                <a class="btn btn-primary" href="{{ route('admin.usuarios.conferente.new') }}">
                                    Cadastrar Conferente
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
                                    <th scope="col" class="sort" data-sort="budget">Nome</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                    <th scope="col" class="sort" data-sort="completion">E-mail</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                @foreach ($conferentes as $usuario)
                                    <tr>
                                        <th scope="row">
                                            {{ $usuario->id }}
                                        </th>
                                        <td class="budget">
                                            {{ $usuario->nome }}
                                        </td>
                                        <td>
                                            <label class="custom-toggle">
                                                <input type="checkbox" class="status-usuario" value="{{ $usuario->id }}"
                                                    @if ($usuario->status) checked @endif>
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                                    data-label-on="Yes"></span>
                                            </label>
                                        </td>
                                        <td>
                                            {{ $usuario->email }}
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.conferente.edit', ['id' => "$usuario->id"]) }}">
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
